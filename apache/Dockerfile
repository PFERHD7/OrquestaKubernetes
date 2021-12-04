# Desde la imagen padre de apache
FROM php:8.0-apache

# Hacer un UPDATE y un UPGRADE
RUN apt-get update && apt-get upgrade -y

# Instalar en el contenedor mysqli
RUN docker-php-ext-install mysqli pdo_mysql pdo  && docker-php-ext-enable mysqli pdo_mysql pdo

# Copiar los documentos del CRUD a la carpeta html del host 
COPY ./CRUD/ /var/www/html/

# Exponer el puerto 80
EXPOSE 80

CMD /usr/sbin/apache2ctl -D FOREGROUND