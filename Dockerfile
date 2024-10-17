# Use the official PHP 8.1 image
FROM php:8.1.6

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

# Copy Composer binary from an official Composer image (for optimization)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install required system dependencies
RUN apt-get update && apt-get install -y zlib1g-dev \
    libzip-dev \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql sockets zip

# Create a directory for your Laravel app
RUN mkdir /app

# Copy your Laravel application files into the container
ADD . /app

# Set the working directory to your Laravel app
WORKDIR /app

# Install NPM and Node.js
RUN apt-get install -y nodejs npm

# Install NPM packages for your Laravel app
RUN npm install

# Install Laravel Mix globally (optional but often useful)
RUN npm install -g laravel-mix

# Set the COMPOSER_ALLOW_SUPERUSER environment variable
ENV COMPOSER_ALLOW_SUPERUSER=1

# Install the bcmath extension
RUN docker-php-ext-install bcmath


# Run Composer to install PHP dependencies
RUN composer update 
RUN composer install

# Expose the sport for Laravel
EXPOSE 8000

# Start the Laravel development server
CMD php artisan serve --host=0.0.0.0 --port=8000
