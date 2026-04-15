
FROM php:7.4-fpm

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    nginx \
    supervisor \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libfontconfig1 \
    libxrender1 \
    libxext6 \
    xfonts-75dpi \
    xfonts-base \
    wkhtmltopdf \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql zip gd \
    && curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean



# Copiar el contenido del proyecto al contenedor
COPY . /var/www/html

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Marcar el directorio como seguro para Git
RUN git config --global --add safe.directory /var/www/html

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --version=1.10.26 --install-dir=/usr/local/bin --filename=composer
# Instalar dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Copiar la configuración de Nginx
COPY docker/nginx.conf /etc/nginx/sites-available/default

# RUN chown -R $USER:$USER /var/www/html/storage/logs
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage
# Establecer permisos para el directorio de almacenamiento


# Exponer el puerto 80
EXPOSE 80

# Iniciar Nginx y PHP-FPM
CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]
