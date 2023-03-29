FROM php:8.2-cli-alpine

RUN apk update && apk add --no-cache git zip unzip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

WORKDIR /app

COPY . .

RUN composer install --no-dev

CMD ["tail", "-f", "/dev/null"]
