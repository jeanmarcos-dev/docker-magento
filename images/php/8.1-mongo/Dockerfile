FROM jeanmarcos/magento-php:8.1-fpm

USER root

RUN set -eux; \
    apt-get update; \
    apt-get install -y --no-install-recommends \
        libssl-dev \
        pkg-config \
        $PHPIZE_DEPS; \
    rm -rf /var/lib/apt/lists/*

# RUN install -d /usr/local/etc \
#  && printf "<?php // build-time stub\n" > /var/www/html/multistore-mapping.php

RUN set -eux; \
    yes '' | php \
      -d auto_prepend_file= \
      -d auto_append_file= \
      /usr/local/bin/pecl install -f mongodb-1.18.1; \
    docker-php-ext-enable mongodb || echo "extension=mongodb.so" > "$PHP_INI_DIR/conf.d/docker-php-ext-mongodb.ini"

USER app:app

