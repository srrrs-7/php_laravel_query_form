laravel:
	composer create-project laravel/laravel pjt --prefer-dist

install:
	composer install
	npm install

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

api:
	php artisan make:controller ApiController

mail:
	php artisan make:mail ContactsSendmail

tinker:
	php artisan tinker
	Mail::raw('test mail',function($message){$message->to('test@example.com')->subject('test');});

mysql:
	docker run --name mysql -p 3306:3306 -e MYSQL_ROOT_PASSWORD=secret -d mysql

sshdb:
	docker exec -it mysql bash
	mysql -u root -p
	docker network inspec mysql_default | grep -i gateway
	CREATE USER 'root'@'192.168.16.1' IDENTIFIED BY 'secret'

migrateup:
	php artisan migrate

composebuild:
	docker-compose build

composeup:
	docker-compose up -d

composedown:
	docker compose down --volumes

ui:
	composer require laravel/ui

bootstrap:
	php artisan ui bootstrap

vite:
	npm i
	npm run build

tailwind:
	npm install -D tailwindcss postcss autoprefixer
	npx tailwindcss init -p

pdf:
	composer require barryvdh/laravel-dompdf