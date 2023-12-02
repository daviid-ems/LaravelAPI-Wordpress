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

# Establece los permisos adecuados
RUN chown -R www-data:www-data /var/www/api
RUN chown -R www-data:www-data /var/www/html

# Expone los puertos según lo especificado en docker-compose.yml
EXPOSE 80
EXPOSE 8080

# Comando para iniciar Nginx en primer plano
CMD ["nginx", "-g", "daemon off;"]

