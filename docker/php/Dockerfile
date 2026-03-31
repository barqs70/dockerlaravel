FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    gnupg \
    ca-certificates \
    sudo
RUN docker-php-ext-install pdo pdo_mysql mbstring xml zip

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

RUN pecl install redis \
    && docker-php-ext-enable redis


COPY --from=composer:2.9.5 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

CMD ["php-fpm"]
