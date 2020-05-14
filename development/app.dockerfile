FROM php:7.2-fpm

COPY composer.lock composer.json /var/www/backend/

COPY database /var/www/backend/database

WORKDIR /var/www/backend

RUN apt-get update && apt-get -y install git && apt-get -y install zip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '${composer_hash}') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php \
    php -r "unlink('composer-setup.php');" \
    php composer.phar install --no-dev --no-scripts \
    rm composer.phar

COPY . /var/www/backend

RUN chown -R www-data:www-data \
        /var/www/backend/storage \
        /var/www/backend/bootstrap/cache

RUN  apt-get install -y libmcrypt-dev \
        libmagickwand-dev --no-install-recommends \
        && pecl install mcrypt-1.0.2 \
        && docker-php-ext-install pdo_mysql \
        && docker-php-ext-enable mcrypt

RUN mv .env.prod .env

#RUN php artisan optimize