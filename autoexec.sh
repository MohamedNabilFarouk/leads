#!/bin/bash
## Put your commands here ##
cd /app &&


composer update

php artisan dump-autoload 
php artisan optimize




php artisan migrate --force --seed &&
php artisan optimize:clear &&
php artisan optimize &&
chmod 777 -R storage bootstrap/cache && 
chmod 777 -R storage public && 
chmod 777 -R storage public/photos && 
php artisan permission:cache-reset 
php artisan config:cache

## End commands ##

exit 0

