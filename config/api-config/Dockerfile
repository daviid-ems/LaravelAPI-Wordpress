# Utiliza la imagen oficial de PHP con Alpine
FROM php:8.1-fpm-alpine

# Establece el directorio de trabajo en el contenedor
WORKDIR /var/www/api

# Instala las dependencias de Laravel usando Composer
RUN apk --no-cache add \
    libzip \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo_mysql zip

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia el archivo composer.json y composer.lock al directorio de trabajo
COPY ./api/composer.json .
COPY ./api/composer.lock .

# Instala las dependencias de Composer
RUN composer install --no-scripts --no-autoloader

# Copia los archivos de la aplicación al directorio de trabajo
COPY ./api .

# Crea el archivo .env
COPY ./api/.env.example .env

# Genera la clave de la aplicación de Laravel
RUN php artisan key:generate

# Ejecuta el comando de Artisan para cargar la configuración y optimizar la aplicación
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan optimize

# Expone el puerto 8000
EXPOSE 8000

# Inicia el servidor de desarrollo de Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
