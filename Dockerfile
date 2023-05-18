# Use the base PHP image of your choice
FROM php:8.1-fpm

# Install necessary dependencies
RUN apt-get update && \
    apt-get install -y git zip unzip

# Install Redis extension
RUN pecl install redis && \
    docker-php-ext-enable redis

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Update Composer
RUN composer self-update --2

# Set the working directory
WORKDIR /var/www/html

# Copy your Laravel application code into the container
COPY . /var/www/html

# Expose the necessary port(s)
EXPOSE 80

# Start the PHP web server
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html/public"]
