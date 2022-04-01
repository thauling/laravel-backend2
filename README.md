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


## for sanctum 
	installed by default BUT make sure to uncomment sanctum middleware line in Http\Kernel.php:
	 'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class, //uncommented to enable SPA authentication
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

## interacting with API in Insomnia
	for user registration, remember to add password_confirmation field 

	after login, copy token to clipboard
	paste as Bearer token for authentication, do NOT enclose in quotes, e.g
	TOKEN 8|5pR35n3yy0cN6UUKDyhL9vu52NBblHaQ7ArwVgBy
	make sure that Header is set:
	Accept	application/json

