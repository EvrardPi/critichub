FROM php:8.2-apache

# Update nécessaire à l'installation des paquets
RUN apt-get update -y

# Install Postgre PDO
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Installation des paquets
RUN apt-get install -y libpng-dev libfreetype6-dev libyaml-dev sudo nano git curl zip unzip dos2unix sass

# Configuration docker avec PHP
RUN docker-php-ext-configure gd --with-freetype && docker-php-ext-install gd

# Utilisation de YAML (Extension PHP pour du YAML)
RUN pecl install yaml

# Configuration du user www-data + réécriture d'URL (activation du module apache2)
RUN usermod -u 1000 www-data && a2enmod rewrite

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY composer* .

RUN composer install

WORKDIR /var/www/html

COPY app/* .

# Réglage des droits utilisateurs du projet
RUN chown -R www-data:www-data ./
RUN chmod -R 755 ./