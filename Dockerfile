FROM php:8.2-fpm

# Installer dépendances système et extensions PHP
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip wget \
    default-mysql-client libpq-dev libzip-dev libicu-dev libxml2-dev \
    libmariadb-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Installer wait-for-it
RUN wget https://raw.githubusercontent.com/vishnubob/wait-for-it/master/wait-for-it.sh -O /usr/local/bin/wait-for-it \
    && chmod +x /usr/local/bin/wait-for-it

# Installer Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Créer dossier de travail
WORKDIR /var/www

# Copier les fichiers Laravel
COPY . .

COPY ./public /var/www/html/public


# Installer les dépendances Laravel
RUN composer install --optimize-autoloader --no-dev

# Donner les bons droits
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000
CMD ["sh", "-c", "wait-for-it db:3306 -- php-fpm"]
