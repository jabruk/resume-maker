FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      git && \
      docker-php-ext-install pdo_mysql && \
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install zip && \
      apt-get clean && \
      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY ./docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

# Install composer
# Install composer
# ENV COMPOSER_ALLOW_SUPERUSER=1
# RUN curl -sS https://getcomposer.org/installer | php -- \
#     --filename=composer \
#     --install-dir=/usr/local/bin
# Install composer:
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# #Install npm
# RUN apt-get update && apt-get upgrade -y && \
#     apt-get install -y nodejs \
#     npm 
    
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data


RUN set -ex \
    && apt-get update \
    && apt-get install -y postgresql-server-dev-all nodejs yarn npm \
    && docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www/html