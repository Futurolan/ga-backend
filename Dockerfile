FROM drupal:8.4.4

WORKDIR /var/www/html

RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data

COPY src/modules modules
COPY src/sync sync
COPY src/themes themes


EXPOSE 80


