FROM php:8.2-apache

# 1. Instalar dependencias del sistema y librerías de SQLite
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    sqlite3 \
    unzip \
    && docker-php-ext-install pdo pdo_sqlite

# 2. Configurar Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN a2enmod rewrite

# 3. Copiar el código
COPY . /var/www/html

# 4. Instalar Composer y dependencias
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# 5. Asegurar carpeta y archivo de base de datos
RUN mkdir -p /var/www/html/database
RUN touch /var/www/html/database/database.sqlite

# 6. Permisos para que PHP pueda escribir en la BD
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
RUN chmod -R 775 /var/www/html/storage /var/www/html/database

# 7. Limpiar caché y EJECUTAR MIGRACIONES (Crea las tablas)
RUN php artisan config:clear
RUN php artisan migrate --force