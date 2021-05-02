# useful console commands

docker-compose build app
docker-compose up -d

docker-compose exec app php artisan
docker-compose exec app php artisan migrate 

docker-compose exec app composer phploc
docker-compose exec app composer phpcs
docker-compose exec app composer phplint
docker-compose exec app composer phpcpd 
docker-compose exec app composer phpmd 
