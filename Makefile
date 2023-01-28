run:
	php artisan serve

route:
	php artisan route:list

clear:
	php artisan cache:clear
	php artisan config:cache

controller:
	php artisan make:controller ContactsController

mail:
	php artisan make:mail ContactsSendmail