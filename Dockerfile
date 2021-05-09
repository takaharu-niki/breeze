FROM php:8.0.3-fpm-alpine3.13

RUN docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql

COPY --from=composer /usr/bin/composer /usr/bin/composer
