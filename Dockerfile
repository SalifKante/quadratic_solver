# Use the official PHP image with Apache
FROM php:8.0-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install PHP extensions required by Laravel
RUN docker-php-ext-install pdo pdo_mysql gd zip

# Set the working directory in the container
WORKDIR /var/www

# Copy the existing application directory contents to the working directory
COPY . /var/www

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Set the correct permissions for Laravel directories
RUN chown -R www-data:www-data /var/www
RUN chmod -R 775 /var/www/storage
RUN chmod -R 775 /var/www/bootstrap/cache

# Expose port 80 (the default HTTP port)
EXPOSE 80

# Start the Apache server in the foreground
CMD ["apache2-foreground"]
