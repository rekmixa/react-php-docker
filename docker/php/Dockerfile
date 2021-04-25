FROM php:7.4-fpm

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ARG USER_ID=1000

WORKDIR /app
ADD . /app

RUN chown -R www-data:www-data /app
RUN usermod -o -u ${USER_ID} -g www-data www-data

RUN apt-get update && apt-get install -y \
        curl \
        wget \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libonig-dev \
        libzip-dev \
        libmcrypt-dev \
        && pecl install mcrypt-1.0.3 \
        && docker-php-ext-enable mcrypt \
        && docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo_mysql zip \
        && docker-php-ext-configure gd --with-freetype --with-jpeg \
        && docker-php-ext-install -j$(nproc) gd
