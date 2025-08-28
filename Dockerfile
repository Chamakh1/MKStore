FROM php:8.2-fpm

# Installer dépendances système et extensions PHP
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip wget \
    default-mysql-client libzip-dev libicu-dev libxml2-dev \
    libmariadb-dev nginx supervisor \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copier le code source
COPY . .

# Installer les dépendances PHP
RUN composer install --optimize-autoloader --no-dev
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Copier la config Nginx
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Copier la config supervisord
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 8080

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
