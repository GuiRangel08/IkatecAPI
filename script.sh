#!/bin/bash
composer install
composer dump-autoload
php artisan serve