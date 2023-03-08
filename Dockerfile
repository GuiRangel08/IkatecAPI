FROM php:8.1-apache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo_mysql

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . .

RUN composer install && composer dump-autoload

RUN chown -R www-data:www-data storage bootstrap/cache

COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf