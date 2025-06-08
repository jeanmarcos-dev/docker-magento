FROM markoshust/magento-php:8.4-fpm
LABEL maintainer="Jeanmarcos Juarez <janmarcoj@gmail.com>"

COPY conf/blackfire.ini $PHP_INI_DIR/conf.d/blackfire.ini
COPY conf/spx.ini $PHP_INI_DIR/conf.d/spx.ini
COPY conf/msmtprc /etc/msmtprc
COPY conf/php.ini $PHP_INI_DIR
COPY conf/php-fpm.conf /usr/local/etc/
COPY conf/www.conf /usr/local/etc/php-fpm.d/
