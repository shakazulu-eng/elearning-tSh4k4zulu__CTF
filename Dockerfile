FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install zip pdo_mysql pdo_pgsql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN mkdir -p storage/framework/cache/data
RUN mkdir -p storage/framework/views
RUN mkdir -p storage/framework/sessions
RUN mkdir -p storage/logs
RUN mkdir -p bootstrap/cache

RUN chmod -R 775 storage bootstrap/cache
EXPOSE 10000

CMD php artisan optimize:clear && \
    php artisan migrate --force && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan serve --host=0.0.0.0 --port=${PORT:-10000}
