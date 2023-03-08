FROM php:8.1-apache

RUN apt-get update && apt-get install -y     libzip-dev     && docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . .

RUN composer install && composer dump-autoload

RUN chown -R www-data:www-data storage bootstrap/cache

COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf