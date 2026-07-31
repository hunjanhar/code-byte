FROM php:8.2-alpine

RUN apk update && apk upgrade --no-cache && \
    apk add --no-cache --virtual .build-deps $PHPIZE_DEPS && \
    docker-php-ext-install pdo pdo_mysql mysqli && \
    pecl install redis && \
    docker-php-ext-enable redis && \
    apk del .build-deps

RUN echo "output_buffering = On" > /usr/local/etc/php/conf.d/output-buffering.ini

COPY --chown=www-data:www-data . /var/www/html/

RUN mkdir -p /home/www-data && chown -R www-data:www-data /home/www-data
ENV HOME=/home/www-data

USER www-data

EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html"]