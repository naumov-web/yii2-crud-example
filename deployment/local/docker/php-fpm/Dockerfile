FROM php:7.4-fpm

COPY . /var/www

WORKDIR /var/www

RUN apt-get update && apt-get install --assume-yes zlib1g-dev

RUN apt-get install -y libpq-dev
RUN docker-php-ext-install pgsql pdo pdo_pgsql

RUN apt-get --assume-yes install git
RUN apt-get install unzip

RUN curl -sL https://getcomposer.org/installer | php -- --install-dir /usr/bin --filename composer

#RUN composer global require --optimize-autoloader "fxp/composer-asset-plugin:^1.4.1"
#RUN composer global dumpautoload --optimize
#RUN composer clear-cache

CMD composer install --prefer-dist --no-interaction --working-dir=/var/www && php-fpm