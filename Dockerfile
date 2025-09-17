# Imagen base con PHP 8.4
FROM php:8.4-cli

# Instalar dependencias necesarias para Laravel y PostgreSQL
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Instalar Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos del proyecto
COPY . .

# Instalar dependencias de Laravel (solo producción)
RUN composer install --no-dev --optimize-autoloader

# Generar cache de configuración
RUN php artisan config:cache && php artisan route:cache

# Puerto para Laravel
EXPOSE 10000

# Comando para iniciar Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
