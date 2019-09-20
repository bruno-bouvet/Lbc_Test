# Test CRM LeBonCoin

# HOW TO INSTALL: 
- clone : git@github.com:bruno-bouvet/Lbc_Test.git
- run docker : [sudo] docker-compose up -d (it should work ..)
- run composer install
- configure the database in the .env file ( DATABASE_URL=mysql://db_user:db_pass@127.0.0.1:3306/db_name )
- create it mysql or equivalent
- create database : bin/console doctrine:database:create 
- populate database : bin/console doc:fix:load

You're done. 


# Explications

Bonjour, si vous lisez ceci je vous souhaite une bonne fin de journée comme il semble que je vais vous envoyer ceci un peu tard.
Je n'ai pas pu terminer le test, ceci pouvant s'expliquer par les problèmes que j'ai eu à faire fonctionner docker sur ma machine. 
Plus précisément, je ne sais pas s'il fonctionnait, j'ai un environnement complet installé à la main sur mon mac et j'ai bien l'impression qu'ils sont entrés en collision. 

Ce que j'ai eu le temps de faire néanmoins : 
- création des entités et ajouts de fixtures pour pouvoir tester la base
- Authentification et Écran de login : (reste à rajouter les rôle et la création de users, ils ont pour le moment peuplés automatiquement, avec un admin en dernier.)
- Écran de liste des contacts et création des contacts : add, show, delete fonctionnent

# Left to do : 
- création de L'API REST sous symfony, et ajout de fonctions de nettoyage des noms et prénom et prise en compte des palindromes et ses tests.
- Script d’optimisation de la BDD
