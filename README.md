# docker-compose up, then start vscode: code .

# inside attached shell, run

composer create-project --prefer-dist laravel/laravel app

# to create a new Laravel project 

## note: needed to run
	composer config -g secure-http false
	followed by
	composer clearcache

to solve SSL certificate error	

# create database with name laravel in adminer
	CREATE DATABASE laravel;

# start serving laravel app (navigate into project foler, here LaravelForm )
 php artisan serve --host 0.0.0.0 //--port 8000 can be omitted