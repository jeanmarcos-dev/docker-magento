FROM jeanmarcos/magento-php-without-xdebug:8.1-fpm

USER root

RUN set -eux; \
    apt-get update; \
    apt-get install -y --no-install-recommends \
        libssl-dev \
        pkg-config \
        $PHPIZE_DEPS; \
    rm -rf /var/lib/apt/lists/*

RUN install -d /usr/local/etc \
 && printf "<?php // build-time stub\n" > /var/www/html/multistore-mapping.php

RUN set -eux; \
    yes '' | pecl install -f mongodb-1.18.1; \
    extdir="$(php-config --extension-dir)"; \
    test -f "$extdir/mongodb.so"; \
    echo "extension=mongodb.so" > "$PHP_INI_DIR/conf.d/docker-php-ext-mongodb.ini"

USER app:app

