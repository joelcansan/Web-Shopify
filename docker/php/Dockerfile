FROM php:8.2-cli-alpine

RUN apk add --no-cache oniguruma-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring

WORKDIR /var/www/html