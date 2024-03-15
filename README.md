### Install Document ###

* Laravel 8.x + PHP 7.4 + MYSQL + MONGODB + REDIS
* composer require predis/predis ^1.0
* composer require jenssegers/mongodb ^3.5
* composer require bensampo/laravel-enum
* composer require tymon/jwt-auth
* php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
* php artisan migrate
