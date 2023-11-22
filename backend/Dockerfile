FROM php:latest

WORKDIR /app
COPY . /app
RUN apt-get update && \ 
apt-get install -y zip unzip
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer update