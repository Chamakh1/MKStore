FROM php:8.2-cli

# Installer dépendances système et extensions PHP
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip wget \
    default-mysql-client libpq-dev libzip-dev libicu-dev libxml2-dev \
    libmariadb-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Installer Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Créer dossier de travail
WORKDIR /var/www

# Copier les fichiers Laravel
COPY . .

# Installer les dépendances Laravel
RUN composer install --optimize-autoloader --no-dev

# Donner les bons droits
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exposer le port dynamique Railway
EXPOSE 8080

# Lancer Laravel en utilisant le port fourni par Railway
CMD sh -c "php artisan serve --host=0.0.0.0 --port=\$PORT"


