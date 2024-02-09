# Use the official image for PHP
FROM php:7.4-fpm

# Install curl and additional dependencies if needed
RUN apt-get update && \
    apt-get install -y curl git unzip \
    && rm -rf /var/lib/apt/lists/*

# Copy contents to working directory
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install Composer
ENV COMPOSER_VERSION 2.1.5

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=${COMPOSER_VERSION}

# Check Composer version
RUN composer --version

# Install project dependencies using Composer
RUN composer install

# Expose the port PHP-FPM listens on (if needed)
# EXPOSE 9000

# Command to start PHP-FPM when the container runs
CMD ["php-fpm", "-D"]
