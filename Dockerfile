FROM php:8.2-apache

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    unzip \
    zip \
    git \
    curl \
    libzip-dev \
    && docker-php-ext-install zip

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copier les fichiers du projet dans le conteneur
COPY . /var/www/html

# Déplacer le DocumentRoot d'Apache vers /var/www/html
RUN sed -i 's#/var/www/html#/var/www/html#g' /etc/apache2/sites-available/000-default.conf

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Donner les bons droits à Apache
RUN chown -R www-data:www-data /var/www/html

# Activer mod_rewrite si besoin (pour les frameworks ou routes propres)
RUN a2enmod rewrite

# Exposer le port Apache
EXPOSE 80