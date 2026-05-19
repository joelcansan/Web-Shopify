FROM php:8.2-cli-alpine

RUN apk add --no-cache oniguruma-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring

WORKDIR /var/www/html

COPY . .

CMD sh -c "php -S 0.0.0.0:${PORT:-8080} -t /var/www/html/public /var/www/html/public/router.php"