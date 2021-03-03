### project order backend

#### Lets make it work 

```bash
composer install
bin/console doctrine:database:create
bin/console doctrine:schema:update --force
bin/console doctrine:fixtures:load 
php -S 127.0.0.1:9002 -t public or php -S 0.0.0.0:9002 -t public

```

visit `127.0.0.1:9002/api/doc`  you can see the api documentation.
