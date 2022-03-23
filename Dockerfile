FROM composer:latest AS composer

COPY . /var/www
WORKDIR /var/www
RUN composer install --no-dev --optimize-autoloader
RUN php artisan vite:config --export=vite.config.json

FROM node AS node

COPY . /var/www
COPY --from=composer /var/www/vite.config.json /var/www/vite.config.json

WORKDIR /var/www
RUN npm --version && npm install && npm run build && ls /var/www/public/build

FROM trafex/php-nginx

USER root

RUN apk add --no-cache php8-pdo_mysql php8-exif php8-pcntl php8-bcmath php8-tokenizer php8-fileinfo php8-xmlwriter

WORKDIR /var/www

COPY . .

COPY --from=node /var/www/public/build /var/www/public/build
RUN rm -r html; ln -s public html; chown -R nobody:nobody /var/www

COPY --from=composer /var/www/vendor /var/www/vendor
RUN ls /var/www/public/build && ls /var/www/public/build/assets

RUN yes | php artisan key:generate && yes | php artisan cache:clear

USER nobody
