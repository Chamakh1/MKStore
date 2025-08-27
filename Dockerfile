FROM php:8.2-fpm

# Installer dépendances système et extensions PHP + Nginx
RUN apt-get update \
    && apt-get install -y --no-install-recommends git curl zip unzip wget \
       default-mysql-client libzip-dev libicu-dev libxml2-dev libmariadb-dev nginx supervisor \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*


# Installer Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Créer le dossier de travail
WORKDIR /var/www

# Copier le code Laravel
COPY . .

# Installer les dépendances Laravel
RUN composer install --optimize-autoloader --no-dev

# Permissions Laravel
RUN chown -R www-data:www-data /var/www/public /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 755 /var/www/public
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Configurer Nginx pour Laravel
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Supervisord pour lancer Nginx + PHP-FPM
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Exposer le port dynamique Railway
EXPOSE 8080

# Lancer supervisord (qui gère Nginx + PHP-FPM)
CMD ["/usr/bin/supervisord", "-n"]
