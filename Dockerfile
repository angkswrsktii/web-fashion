# -----------------------------------------------------------------
# DOCKERFILE LENGKAP UNTUK LARAVEL DI RAILWAY
# -----------------------------------------------------------------

# Gunakan base image resmi PHP 8.2 dengan Apache
# (Ganti 8.2 jika versi PHP Anda berbeda)
FROM php:8.2-apache

# Setel variabel agar instalasi tidak menanyakan hal interaktif
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

# 2. Instal Composer (Manajer Paket PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Setel Direktori Kerja
WORKDIR /var/www/html

# 4. Salin Konfigurasi vhost Apache
# Ini memberitahu Apache untuk melayani dari folder /public
# Pastikan Anda punya file vhost.conf
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

# 5. Aktifkan mod_rewrite (Untuk URL cantik Laravel)
RUN a2enmod rewrite

# 6. Salin file composer dan jalankan install
# Ini membuat folder /vendor dan file autoload.php
COPY composer.json composer.lock ./
RUN composer install --no-interaction --no-scripts --no-dev --optimize-autoloader

# 7. Salin sisa kode aplikasi
COPY . .

# 8. PERBAIKAN PENTING: Atur Izin (Permissions)
# Ini adalah perbaikan untuk error 500
# Kita berikan izin tulis penuh ke Apache (www-data)
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache

# Selesai! Base image akan otomatis menjalankan Apache