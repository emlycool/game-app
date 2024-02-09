# Use the official image for PHP
FROM php:7.4-fpm

# Install curl and additional dependencies
RUN apt-get install -y curl
# RUN apt-get update && \
#     apt-get install -y curl git unzip php php-curl && \
#     rm -rf /var/lib/apt/lists/*
RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt pdo_mysql

# Install PHP extensions
# RUN apt-get update && \
#     apt-get install -y libpng-dev && \
#     docker-php-ext-install pdo pdo_mysql gd



# Copy contents to working directory
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Check Composer version
RUN composer --version

# Install project dependencies using Composer
RUN composer install

# Expose the port PHP-FPM listens on
EXPOSE 80

# Command to start PHP-FPM when the container runs
CMD ["php-fpm", "-D"]
