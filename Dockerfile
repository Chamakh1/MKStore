FROM php:8.2-fpm

# Installer dépendances + nginx + supervisor
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip wget \
    default-mysql-client libzip-dev libicu-dev libxml2-dev libmariadb-dev \
    nginx supervisor \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Configurer PHP-FPM pour écouter sur 9000 (au lieu du socket)
RUN sed -i 's|listen = /run/php/php-fpm.sock|listen = 9000|' /usr/local/etc/php-fpm.d/www.conf

# Installer Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Répertoire de travail
WORKDIR /var/www

# Copier projet Laravel
COPY . .

# Installer dépendances Laravel
RUN composer install --optimize-autoloader --no-dev \
    && chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Copier configs
COPY nginx.conf /etc/nginx/conf.d/default.conf
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# ... autres instructions ...

# Copier le template nginx
COPY nginx.conf /etc/nginx/conf.d/default.conf.template

# Copier le script de démarrage
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Exposer le port
EXPOSE $PORT

# Lancer le script de démarrage
CMD ["/usr/local/bin/start.sh"]
