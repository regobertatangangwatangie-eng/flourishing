# Use official PHP 8.2 with Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install required PHP extensions and utilities
RUN apt-get update && apt-get install -y --no-install-recommends \
        unzip \
        git \
        libzip-dev \
        libonig-dev \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        && docker-php-ext-configure zip \
        && docker-php-ext-install mysqli pdo pdo_mysql zip \
        && docker-php-ext-configure gd --with-freetype --with-jpeg \
        && docker-php-ext-install gd \
        && a2enmod rewrite \
        && apt-get clean \
        && rm -rf /var/lib/apt/lists/*

# Copy project files into container
COPY . /var/www/html/

# Set permissions (Apache user)
RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;

# Expose Apache port
EXPOSE 80

# Start Apache in foreground
CMD ["apache2-foreground"]

