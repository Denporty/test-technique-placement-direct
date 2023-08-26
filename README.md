<p align="center"><a href="https://www.placement-direct.fr/" target="_blank"><img src="https://www.comparateurbanque.com/files/2019/09/logoplacementdirect.png" width="400" alt="Laravel Logo"></a></p>

## A propos du projet

Le projet se compose de 2 features :

- Système d'authentification via le starter kit Laravel Breeze dans sa version Inertia modifié pour ajouter un numéro de téléphone, 
un grade via un boolean, un prénom, nom et pseudo. 
- Mise en place d'une feature pour gérer des contrats. La feature est découpée en 2 parties :
  - Partie administrateur : peut créer un contrat qui se compose d'un titre, une description, un utilisateur lié au contrat et un fichier pdf
  représentant le dit contrat. Les administrateurs peuvent voir l'intégralité des contrats ainsi que les modifier ou les supprimer. Les administrateurs ne
  peuvent pas signer des contrats à la place des utilisateurs.
  - Partie utilisateur : peuvent voir UNIQUEMENT les contrats qui leur sont attribués. Ils ont également la possibilité de visualiser le contrat
  et de le signer. Lorsqu'un contrat est signé l'utilisateur ne peut pas enlever la signature.

## Liste des technos 

Front :
- VueJS en v3
- Tailwind
- SCSS
- Vite

Back :
- Laravel
- Inertia

DB :
- pgSQL

## Initialiser le projet 

Dans un premier temps il vous faut configurer votre .env avec vos données de DB. Pour ce faire je vous invite à dupliquer le 
fichier .env.example qui regroupe toutes les variables d'environnement dont vous aurez besoin.

Pour setup le projet vous pouvez utiliser directement le script setupScript.sh
```bash
sh setupScript.sh
```
Le script setupScript exécute les commandes suivantes : 

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
    # php artisan db:seed --class=UserSeeder
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

Si vous souhaitez initialiser vous-même le projet voici les étapes à suivre : 

Installation des librairies php
```
composer install
```
Génération de la clé d'application 
```
php artisan key:generate
```
Migrations (j'ai décidé de simplifier la mise en place d'un compte admin et utilisateur classique en incorporant le compte directement à la migration mais un seeder est également présent dans database/seeders/UserSeeder.php)
```
php artisan migrate:fresh
```
Installation des librairies node
```
npm install
```
Il vous suffit alors de faire les commandes pour démarrer le projet.

## Démarrer le projet

Pour démarrer le projet il vous faut faire :
```bash
php artisan serve
```
Ainsi que
```
npm run dev
```
