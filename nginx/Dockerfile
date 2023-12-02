# Usa la imagen oficial de Nginx como base
FROM nginx:latest

# Elimina la configuración predeterminada de Nginx
RUN rm /etc/nginx/conf.d/default.conf

# Copia los archivos de configuración personalizados
COPY ./nginx/api.conf /etc/nginx/conf.d/api.conf
COPY ./nginx/wordpress.conf /etc/nginx/conf.d/wordpress.conf

# Copia los archivos estáticos de la aplicación Laravel y WordPress
COPY ./api/public /var/www/api/public
COPY ./wordpress /var/www/html

# Crea directorios para los logs
RUN mkdir -p /var/log/nginx

# Establece los permisos adecuados
RUN chown -R www-data:www-data /var/www/api /var/www/html \
    && chmod -R 755 /var/www/api /var/www/html

# Expone el puerto 80
EXPOSE 80

# Comando para iniciar Nginx en primer plano
CMD ["nginx", "-g", "daemon off;"]
