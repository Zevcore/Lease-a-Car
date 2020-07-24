FROM php:7.2-fpm

RUN apt-get update && \
    apt-get install libxml2-dev libfreetype6-dev libjpeg62-turbo-dev libmcrypt-dev cron zip vim -y \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) iconv soap mysqli mbstring gd\
    && docker-php-ext-install pdo_mysql xml zip fileinfo\
    && docker-php-ext-configure intl\
    && docker-php-ext-install intl\
    && docker-php-ext-install exif
RUN curl --silent --show-error https://getcomposer.org/composer.phar > composer.phar \
    && mv composer.phar /usr/bin/composer
RUN chmod +x /usr/bin/composer

EXPOSE 9000
CMD ["php-fpm", "-F"]
