FROM wordpress:latest
FROM php:8.1-fpm-alpine

WORKDIR /var/www/html

RUN docker-php-ext-install mysqli

COPY ./wordpress /var/www/html

RUN chown -R www-data:www-data /var/www/html