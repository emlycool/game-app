# Use the official image for PHP
FROM php:8.1-fpm

# Install curl and additional dependencies
RUN apt-get update && \
    apt-get install -y curl git unzip && \
    rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN apt-get update && \
    apt-get install -y libpng-dev && \
    docker-php-ext-install pdo pdo_mysql gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy contents to working directory
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install project dependencies using Composer
RUN composer install

# Expose the port PHP-FPM listens on
EXPOSE 9000

# Command to start PHP-FPM when the container runs
CMD ["php-fpm", "-D"]
