# Gunakan image PHP dengan Apache
FROM php:8.2-apache

# Install extensions yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y unzip git libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Salin semua file ke container
COPY . /var/www/html

# Jalankan composer install
RUN composer install --no-dev --optimize-autoloader

# Ubah DocumentRoot Apache ke public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Aktifkan mod_rewrite
RUN a2enmod rewrite

# Pastikan Laravel bisa menulis log/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Jalankan Apache
CMD ["apache2-foreground"]
