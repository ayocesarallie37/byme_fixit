FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git

RUN docker-php-ext-install pdo pdo_mysql

# 🔥 IMPORTANTE: activar mod_rewrite
RUN a2enmod rewrite

# 🔥 CAMBIAR ROOT A /public (clave en Laravel)
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

COPY . /var/www/html

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80