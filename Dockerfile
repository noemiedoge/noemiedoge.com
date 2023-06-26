FROM wordpress:6-php8.1-apache

COPY --from=wordpress:cli-2-php8.1 /usr/local/bin/wp /usr/local/bin/wp

# Remove hello-dolly plugins (not compatible with PHP 8.1)
RUN rm -rf /usr/src/wordpress/wp-content/plugins/hello.php
