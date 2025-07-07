FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    npm \
    nodejs \
    default-mysql-client

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Set correct permissions
RUN mkdir -p bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# Optional: clear & cache config (boleh kamu aktifkan kalau sudah stabil)
# RUN php artisan config:clear && php artisan config:cache

# Optional: Run migration (gunakan jika kamu yakin DB sudah ready)
# RUN php artisan migrate --force || true

# Expose correct port for Render (8080)
EXPOSE 8080

# Start Laravel server (on port 8080)
CMD php artisan serve --host=0.0.0.0 --port=8080
