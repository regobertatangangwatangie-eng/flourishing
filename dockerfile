# Use official PHP with Apache
FROM php:8.2-apache

# Enable Apache mod_rewrite (important for many PHP apps)
RUN a2enmod rewrite

# Install MySQL extension (since you have db.php)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Copy all project files into Apache directory
COPY . /var/www/html/

# Set permissions (important)
RUN chown -R www-data:www-data /var/www/html

# Expose Apache port
EXPOSE 80
