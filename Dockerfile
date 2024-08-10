# Utiliser une image PHP 7.4
FROM php:7.4-apache

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip

# Installer les extensions PHP nécessaires
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers de l'application dans le conteneur
COPY . /var/www/html

# Installer les dépendances PHP avec Composer
RUN composer install

# Changer les permissions des fichiers pour Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Activer le module de réécriture d'URL d'Apache
RUN a2enmod rewrite
