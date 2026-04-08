FROM php:8.2-apache

# 1. Instalar dependencias del sistema y librerías de SQLite
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    sqlite3 \
    unzip \
    && docker-php-ext-install pdo pdo_sqlite

# 2. Configurar Apache (DocumentRoot a /public)
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN a2enmod rewrite

# 3. Copiar el código al servidor
COPY . /var/www/html

# 4. Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 5. Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# 6. Forzar creación de base de datos y dar permisos de escritura (ESTO ARREGLA EL ERROR 500)
RUN touch /var/www/html/database/database.sqlite
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
RUN chmod -R 775 /var/www/html/storage /var/www/html/database