# Gunakan image resmi PHP 8.2 dengan Apache
# (Ganti 8.2 dengan versi PHP Anda jika perlu, misal: php:8.1-apache)
FROM php:8.2-apache

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

# 4. Salin file composer dan jalankan install
# Ini adalah langkah yang memperbaiki error "vendor/autoload.php"
COPY composer.json composer.lock ./
RUN composer install --no-interaction --no-scripts --no-dev --optimize-autoloader

# 5. Salin sisa kode aplikasi
COPY . .

# 6. Salin Konfigurasi vhost Apache
# Ini memberitahu Apache untuk melayani dari folder /public
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

# 7. Aktifkan mod_rewrite (untuk URL cantik Laravel)
RUN a2enmod rewrite

# 8. Setel Izin (Permissions) untuk folder Laravel
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# Port 80 sudah di-expose oleh base image
# Perintah CMD juga sudah ada di base image untuk menjalankan Apache