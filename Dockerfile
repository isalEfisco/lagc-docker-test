FROM ubuntu
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update
RUN apt-get install -y nano nginx php-fpm php7.2 php7.2-cli php7.2-common 

RUN apt-get install -y php7.2-intl php7.2-xml

RUN apt-get install -y php7.2-mbstring php7.2-zip

RUN apt-get install -y curl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY nginx.conf /etc/nginx/sites-available/default
COPY ./src /var/www/html
COPY ./src/.env.dev /var/www/html/.env
ADD ./start.sh /start.sh
RUN chmod 755 /start.sh

COPY ./src /var/www/html

RUN cd /var/www/html && composer install
RUN chmod -Rf 777 /var/www/html/storage
RUN chmod -Rf 777 /var/www/html/resources
RUN php /var/www/html/artisan config:clear

EXPOSE 8082

STOPSIGNAL SIGTERM

ENTRYPOINT /bin/bash -x /start.sh && nginx -g 'daemon off;'