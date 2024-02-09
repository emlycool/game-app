#use the official image for PHP
FROM php:8.1-fpm

#install php extensions
RUN apt-get update && \
    apt-get install -y libpng-dev && \
    docker-php-ext-install pdo pdo_mysql gd

#install what will install dependencies from the composer.json
RUN curl -sS https://getcomposer.org/installer | php


#copy contents to working dir -- php is a scripted language and not a compiled language 
COPY . /var/www/html

#set working directory
WORKDIR /var/www/html


# Expose the port Apache listens on
EXPOSE 80

# command to start Apache when the container runs
CMD [php-fpm -D ]
