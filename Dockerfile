FROM php:7.4-apache
RUN apt-get update -y && apt-get install -y openssl zip unzip git zlib1g-dev
RUN docker-php-ext-install pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY . /mnt/efs/teleFinal:/var/www/html
COPY ./public/.htaccess /mnt/efs/teleFinal:/var/www/html/.htaccess
WORKDIR /var/www/html
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

RUN php artisan key:generate
RUN php artisan storage:link
RUN php artisan migrate:fresh
RUN chmod -R 777 storage
RUN a2enmod rewrite
RUN service apache2 restart