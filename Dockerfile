FROM php:8.2-fpm

# Installer dépendances système et extensions PHP
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip wget \
    default-mysql-client libzip-dev libicu-dev libxml2-dev \
    libmariadb-dev nginx \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Installer Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --optimize-autoloader --no-dev
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Configurer Nginx pour Laravel
COPY nginx.conf /etc/nginx/conf.d/default.conf

EXPOSE 9000
CMD ["php-fpm"]
