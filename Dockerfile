FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    unzip \
    zip

RUN docker-php-ext-configure zip

RUN docker-php-ext-install pdo_mysql zip sockets

RUN curl --silent --show-error https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

RUN pecl install mailparse
