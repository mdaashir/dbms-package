# Use the official PHP image with Apache
FROM php:8.2-apache

# Install necessary system libraries and PHP extensions for PostgreSQL and other features
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    && docker-php-ext-install pdo_pgsql pgsql \
    && a2enmod rewrite

# Install Composer (Dependency Manager for PHP)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory inside the container
WORKDIR /var/www/html

# Copy the project files into the container
COPY . .

# Install PHP dependencies using Composer
RUN composer deploy

# Set proper permissions for Apache to access the files
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 for Apache
EXPOSE 80

# Start Apache server in the foreground
CMD ["apache2-foreground"]
