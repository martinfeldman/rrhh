FROM php:8.1.12-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql sockets

RUN curl -sS https://getcomposer.org/installer​ | \
    php -- --install-dir=/usr/local/bin --filename=composer --version=2.4.4

RUN apk add --no-cache libpng \
    libpng-dev \
    gmp-dev \
    libzip-dev \
    zlib-dev \
    && docker-php-ext-install gd gmp zip \
    && apk del libpng-dev

COPY --from=composer:2.4.4 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

# ADD rrhh.sql /docker-entrypoint-initdb.d

EXPOSE 9990
#EXPOSE 3306
