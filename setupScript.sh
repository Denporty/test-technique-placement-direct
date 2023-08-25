#!/bin/bash
echo "Script pull started"
composer install
read -p "Do you want to generate app key ? : y / N " -n 1 -r
echo    # (optional) move to a new line
if [[ $REPLY =~ ^[Yy]$ ]]
then
    php artisan key:generate
fi
read -p "Do you want to refresh ALL your database ? (/!\ data inserted will be remove /!\) : y / N " -n 1 -r
echo    # (optional) move to a new line
if [[ $REPLY =~ ^[Yy]$ ]]
then
    # do dangerous stuff
    php artisan migrate:fresh
    php artisan migrate --force
    php artisan db:seed --class=UserSeeder
fi
if [[ $REPLY =~ ^[Nn]$ ]]
then
    # do dangerous stuff
    php artisan migrate --force
fi

rm -rf ./bootstrap/cache/config.php
php artisan clear-compiled
php artisan view:clear
php artisan config:clear
php artisan route:cache
php artisan optimize:clear
npm install
echo "Script pull finished"
