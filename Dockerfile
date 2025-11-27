# 1) Imagen base PHP + Apache
FROM php:8.3-apache

# 2) Extensiones necesarias para WordPress
RUN apt-get update && apt-get install -y \
    libjpeg62-turbo-dev \
    libpng-dev \
    libonig-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install gd mysqli zip

# 3) Habilitar mod_rewrite para pretty permalinks
RUN a2enmod rewrite

# 4) Directorio de trabajo
WORKDIR /var/www/html

# 5) Copiar código de WordPress + wp-config.php
COPY . .

# 6) Permisos (típico WP)
RUN chown -R www-data:www-data /var/www/html && \
    find /var/www/html -type d -exec chmod 755 {} \; && \
    find /var/www/html -type f -exec chmod 644 {} \;

EXPOSE 80
CMD ["apache2-foreground"]
