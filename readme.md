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

### With Docker
```
# Start the application
docker-compose up -d

# View logs to monitor installation progress
docker-compose logs -f

# Stop the application
docker-compose down

```
