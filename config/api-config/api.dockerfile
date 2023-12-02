FROM composer:2 AS builder

FROM php:8.1-fpm-alpine


RUN echo "\e[1;33mInstall COMPOSER\e[0m"
RUN cd /tmp \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-install pdo pdo_mysql

RUN echo "\e[1;33mInstall important libraries\e[0m"
RUN apk update && apk add --no-cache \
    build-base \
    git \
    curl \
    libcurl \
    curl-dev \
    zlib-dev \
    libzip-dev \
    zip \
    unzip \
    libbz2 \
    libmcrypt-dev \
    libxml2-dev \
    libintl \
    gettext

WORKDIR /var/www/api

COPY ./api/composer.json ./composer.json
COPY ./api/composer.lock ./composer.lock

COPY ./api /var/www/api

EXPOSE 9000