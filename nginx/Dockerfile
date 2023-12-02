# Usa la imagen oficial de Nginx como base
FROM nginx:latest

# Elimina la configuración predeterminada de Nginx
RUN rm /etc/nginx/conf.d/default.conf

# Copia los archivos de configuración personalizados
COPY ./nginx/api.conf /etc/nginx/conf.d/api.conf
COPY ./nginx/wordpress.conf /etc/nginx/conf.d/wordpress.conf

# Copia los archivos estáticos de la aplicación Laravel y WordPress
COPY ./api/public /var/www/api/public
COPY ./wordpress/wp-content /var/www/html/wp-content

# Crea directorios para los logs
RUN mkdir -p /var/log/nginx

# Establece los permisos adecuados para /var/www/api
RUN chmod -R 775 /var/www/api && \
    chown -R www-data:www-data /var/www/api

# Crea el directorio storage si no existe
RUN mkdir -p /var/www/api/storage

# Cambia el propietario del directorio storage y sus subdirectorios
RUN chown -R www-data:www-data /var/www/api/storage

# Expone los puertos según lo especificado en docker-compose.yml
EXPOSE 80
EXPOSE 8080

# Comando para iniciar Nginx en primer plano
CMD ["nginx", "-g", "daemon off;"]