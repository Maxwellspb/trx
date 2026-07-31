FROM php:8.4-fpm-bookworm

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    libpq-dev \
    librabbitmq-dev \
    libssl-dev \
    libicu-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    git \
    unzip \
    curl \
    acl \
    g++ \
    zlib1g-dev \
    autoconf \
    build-essential \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install \
    pdo_pgsql \
    opcache \
    intl \
    zip \
    bcmath \
    mbstring \
    && docker-php-ext-enable opcache

RUN pecl install redis amqp xdebug \
    && docker-php-ext-enable redis amqp xdebug

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

EXPOSE 9000
