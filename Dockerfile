#use the official image for PHP
FROM php:8.1-fpm

#install php extensions
RUN apt-get install -y libpng-dev && \
    docker-php-ext-install pdo pdo_mysql gd

#install what will install dependencies from the composer.json
RUN apt-get update && apt-get install -y composer

#copy contents to working dir -- php is a scripted language and not a compiled language 
COPY . /var/www/html

#set working directory
WORKDIR /var/www/html

#install app dependencies
RUN composer install

# Expose the port Apache listens on
EXPOSE 80

# command to start Apache when the container runs
CMD [php-fpm -D ]