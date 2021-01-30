FROM php:8-fpm-alpine
WORKDIR /app

RUN apk --update --no-cache add git curl bash
RUN docker-php-ext-install pdo_mysql

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN docker-php-ext-enable opcache

RUN curl -sS https://get.symfony.com/cli/installer | bash && mv /root/.symfony/bin/symfony /usr/local/bin/symfony

COPY etc/infrastructure/php/ /usr/local/etc/php/
