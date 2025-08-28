FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip wget \
    default-mysql-client libzip-dev libicu-dev libxml2-dev libmariadb-dev \
    nginx supervisor \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

RUN composer install --optimize-autoloader --no-dev \
    && chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Nginx config
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Supervisord config
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 8080

CMD ["/usr/bin/supervisord"]
