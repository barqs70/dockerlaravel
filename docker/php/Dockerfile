FROM php:8.4-fpm


RUN apt-get update && apt-get install -y \
    libpq-dev libonig-dev libxml2-dev libzip-dev \
    zip unzip git curl gnupg ca-certificates sudo \
    && docker-php-ext-install pdo pdo_mysql mbstring xml zip

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring xml zip bcmath gd

RUN pecl install redis && docker-php-ext-enable redis \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs && npm install -g npm

COPY --from=composer:2.9.5 /usr/bin/composer /usr/bin/composer

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

WORKDIR /var/www

RUN chown -R www-data:www-data /var/www

USER www-data

CMD ["php-fpm"]
