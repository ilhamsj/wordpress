# Use BuildKit for secure secrets handling
# syntax=docker/dockerfile:1.4

FROM php:8.4-fpm-alpine

# Install required dependencies
RUN apk add --no-cache git unzip libzip-dev oniguruma-dev \
    && docker-php-ext-install mysqli zip mbstring

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy composer files first to utilize caching
COPY composer.json .
COPY composer.lock .

RUN composer install --no-dev --no-cache --prefer-dist

# Copy application source code
COPY . .

# Expose PHP-FPM port
EXPOSE 9000

RUN mkdir /var/log/wordpress
RUN chown -R www-data:www-data /var/log/wordpress

# Start PHP-FPM
CMD ["php-fpm"]
