<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## A propos du projet

Le but de ce test est de réaliser un espace client où les utilisateurs vont pouvoir consulter leurs contrats
souscrits ainsi que leur profil.
- L’accès à l’espace client sera protégé via une authentification et un token JWT.
- La page d’accueil présentera une liste des différents contrats souscrits.
- Sur la page d’accueil, le client pourra accéder à son profil et voir les informations suivantes :
  - Son identifiant ;
  - Son prénom ;
  - Son nom ;
  - Son email ;
  - Son numéro de téléphone ;
- Depuis son profil, l’utilisateur doit pouvoir modifier son email et son numéro de téléphone.
- Facultatif : l’utilisateur pourra aussi modifier son mot de passe (le mot de passe sera crypté en base de
  données).

## Liste des technos 

Front :
- VueJS en v3
- Tailwind
- SCSS
- Vite

Back :
- Laravel
- Inertia

## Déploiement 

Pour setup le projet vous pouvez utiliser directement le script setupScript.sh
```bash
sh setupScript.sh
```
Le script setupScript execute les commandes suivantes : 

```bash
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
```

Vous pouvez donc également le faire directement avec les commandes ci-dessus.

Pour démarrer le projet il vous faut faire : 
```bash
php artisan serve
```
Ainsi que 
```
npm run dev
```
