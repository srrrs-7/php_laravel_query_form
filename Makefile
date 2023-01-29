run:
	php artisan serve

route:
	php artisan route:list

clear:
	php artisan cache:clear
	php artisan config:cache

model:
	php artisan make:model User -m

controller:
	php artisan make:controller ContactsController

mail:
	php artisan make:mail ContactsSendmail

mysql:
	docker run --name mysql -p 3306:3306 -e MYSQL_ROOT_PASSWORD=secret -d mysql

composebuild:
	docker-compose build

composeup:
	docker-compose up -d