FROM php:8.2-fpm

ENV TZ Asia/Tokyo

RUN apt-get update && \
	apt-get install -y git unzip libzip-dev libicu-dev libonig-dev && \
	docker-php-ext-install intl pdo_mysql zip bcmath && \
    git clone https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis && \
      docker-php-ext-install redis

COPY ./.docker/php/php.ini /usr/local/etc/php/php.ini

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/app