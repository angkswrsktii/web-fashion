# Gunakan image PHP + Apache
FROM php:8.2-apache

# Install ekstensi Laravel yang dibutuhkan
RUN docker-php-ext-install pdo pdo_mysql

# Salin semua file ke dalam container
COPY . /var/www/html

# Ubah DocumentRoot Apache ke folder public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Aktifkan mod_rewrite untuk Laravel
RUN a2enmod rewrite

# Ubah konfigurasi agar .htaccess Laravel berfungsi
RUN echo '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/laravel.conf \
    && a2enconf laravel

# Ganti permission agar Laravel bisa nulis di storage
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Jalankan Apache
CMD ["apache2-foreground"]
