up:
	docker-compose up -d

down:
	docker-compose down

build:
	docker-compose up --build -d

test:
	docker-compose exec php-fpm vendor/bin/phpunit

route-list:
	docker-compose exec php-fpm php artisan route:list

perm:
	sudo chmod -R 777 ./

doc:
	apidoc -i api-doc/ -o public/docs

migrate:
	docker-compose exec php-fpm php artisan migrate

migrate-back:
	docker-compose exec php-fpm php artisan migrate:rollback

fresh:
	docker-compose exec php-fpm php artisan migrate:fresh --seed

ide-models:
	docker-compose exec php-fpm php artisan ide-helper:models

clear:
	docker-compose exec php-fpm php artisan cache:clear && docker-compose exec php-fpm php artisan route:clear && docker-compose exec php-fpm php artisan config:clear && docker-compose exec php-fpm php artisan view:clear

composer-dump:
	docker-compose exec php-fpm composer dumpautoload
