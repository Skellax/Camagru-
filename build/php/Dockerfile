FROM php:8.1-apache

COPY ./php.ini /usr/local/etc/php/php.ini

RUN apt-get update && \
    docker-php-ext-install mysqli pdo pdo_mysql
