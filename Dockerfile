# -----------------------------------------------------------------
# DOCKERFILE LENGKAP v3 (DENGAN CACHE CLEAR & PERMISSION FIX)
# -----------------------------------------------------------------

# Gunakan base image resmi PHP 8.2 dengan Apache
FROM php:8.2-apache

ENV DEBIAN_FRONTEND=noninteractive

# 1. Instalasi Dependensi Sistem & Ekstensi PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd xml

# 2. Instal Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Setel Direktori Kerja
WORKDIR /var/www/html

# 4. Salin Konfigurasi vhost Apache
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

# 5. Aktifkan mod_rewrite
RUN a2enmod rewrite

# 6. Salin file composer dan jalankan install
COPY composer.json composer.lock ./
RUN composer install --no-interaction --no-scripts --no-dev --optimize-autoloader

# 7. Salin sisa kode aplikasi
COPY . .

# 8. BARU: Hapus semua cache yang mungkin terbawa dari lokal
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

# 9. BARU: Buat file log & Atur Izin (Permissions) dengan paksa
RUN touch storage/logs/laravel.log
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache

# Selesai!