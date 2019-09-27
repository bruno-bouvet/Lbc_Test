# Test CRM LeBonCoin

# HOW TO INSTALL: 
- clone : git@github.com:bruno-bouvet/Lbc_Test.git

run docker : 
- docker-compose up -d --force-recreate --build
- docker exec -it -u dev lbctest-php-fpm bash (to access sf)
- cd /home/wwwroot/application
- composer install

configure the database in the .env file ( DATABASE_URL=mysql://db_user:db_pass@127.0.0.1:3306/db_name )
- create it mysql or equivalent
- create database : bin/console doctrine:database:create 

populate database : 
- bin/console doc:fix:load

You're done. 

- access app : localhost
- access DB : (for windows: winpty ) docker exec -it -u sf4_mysql bash
- access phpMyAdmin : localhost:8084

To clean if you can't factory reset:

- docker-compose down --rmi all
- docker rm -fv $(docker ps -aq)
- docker rmi $(docker images -q) --force

# Explications

Bonjour, 

Si vous lisez ceci je vous souhaite une bonne journée.

Je n'ai pas pu terminer le test, ceci pouvant s'expliquer par les problèmes que j'ai eu à faire fonctionner docker sur ma machine. 
Plus précisément, je ne sais pas s'il fonctionnait, j'ai un environnement complet installé à la main sur mon mac et j'ai bien l'impression qu'ils sont entrés en collision. 
J'ai aussi fait en partie un migration vers symfony 4 (les parties manquantes étant celles que je n'ai pas encore faites).


# Ce que j'ai eu le temps de faire néanmoins : 
- création des entités et ajouts de fixtures pour pouvoir tester la base.
- Authentification et Écran de login : (reste à rajouter les rôle et la création de users, ils ont pour le moment peuplés automatiquement, avec un admin en dernier.).
- Écran de liste des contacts et création des contacts : add, show, delete fonctionnent.

# Left to do : 
- création de L'API REST sous symfony, et ajout de fonctions de nettoyage des noms et prénom et prise en compte des palindromes et ses tests.
- Script d’optimisation de la BDD.
- retirer certaines fonctions générées inutiles.

# EDIT : Impossible de faire marcher l'image docker venant du générateur j'ai rajouté la mienne qui fonctionne sous php 7.2 et Mysql 8
