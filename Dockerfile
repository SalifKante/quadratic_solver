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
    curl --no-install-recommends && rm -r /var/lib/apt/lists/*

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install PHP extensions required by Laravel
RUN docker-php-ext-install pdo pdo_mysql gd zip

# Set the working directory in the container
WORKDIR /var/www

# Copy composer.lock and composer.json separately to avoid reinstalling dependencies on every build
COPY composer.lock composer.json /var/www/

# Install Composer dependencies first to cache these layers efficiently
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Now copy the rest of the application files
COPY . /var/www

# Set the correct permissions for Laravel directories
RUN chown -R www-data:www-data /var/www
RUN chmod -R 775 /var/www/storage
RUN chmod -R 775 /var/www/bootstrap/cache

# Expose port 80 (the default HTTP port)
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
