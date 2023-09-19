# Use an official PHP image with Apache as a base (choose the PHP version you need)
FROM php:8.0-apache

# Install apt-utils to prevent "debconf: delaying package configuration" errors
RUN apt-get update && apt-get install -y apt-utils

# Set non-interactive mode for debconf
ENV DEBIAN_FRONTEND=noninteractive

# Install the PostgreSQL extension
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql pgsql

# Enable Apache modules
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy your PHP web project files into the container
COPY . /var/www/html

# Expose port 80 for Apache
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
