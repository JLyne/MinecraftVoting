FROM trafex/php-nginx

USER root

RUN apk add --no-cache php8-pdo_mysql php8-exif php8-pcntl php8-bcmath php8-tokenizer php8-fileinfo php8-xmlwriter

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .
RUN rm -r html; ln -s public html; chown -R nobody:nobody /var/www
RUN composer install; php artisan key:generate

USER nobody
