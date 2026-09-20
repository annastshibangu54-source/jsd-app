FROM php:8.2-apache

# Installation de l'extension PostgreSQL pour PHP
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Copie des fichiers dans le serveur web
COPY . /var/www/html/

EXPOSE 80
