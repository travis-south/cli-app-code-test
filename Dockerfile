FROM composer:1.10

RUN apk add --no-cache $PHPIZE_DEPS \
    && pecl install xdebug-2.9.7 \
    && docker-php-ext-enable xdebug

RUN composer global require hirak/prestissimo
