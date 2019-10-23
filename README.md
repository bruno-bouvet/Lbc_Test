# Test CRM LeBonCoin

# HOW TO INSTALL: 
- clone : git@github.com:bruno-bouvet/Lbc_Test.git

run docker : 
- docker-compose up -d --force-recreate --build
- docker exec -it -u dev sf4-php bash (to access sf)
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

