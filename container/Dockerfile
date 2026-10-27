FROM php:8.4.27-apache

# Download and install dependencies
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libpq-dev \
    libzip-dev \
    libicu-dev \
    zip
# Install from docker-php
RUN docker-php-source extract \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && docker-php-ext-install zip \
    && docker-php-ext-install pcntl \
    && docker-php-source delete
# Install xDebug from pecl
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY docker-php-ext-xdebug.ini "$PHP_INI_DIR/conf.d/docker-php-ext-xdebug.ini"

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

EXPOSE 80
