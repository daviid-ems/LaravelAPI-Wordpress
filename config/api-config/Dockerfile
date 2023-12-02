# Usa una imagen oficial de PHP con Composer preinstalado
FROM composer:2 AS builder

FROM php:8.1-fpm-alpine

WORKDIR /var/www/api

COPY ./api/composer.json ./composer.json
COPY ./api/composer.lock ./composer.lock


COPY ./api /var/www/api

COPY ./api/.env.example ./api/.env

RUN chown -R www-data.www-data /var/www/api/storage
RUN chown -R www-data.www-data /var/www/api/bootstrap/cache

EXPOSE 9000