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