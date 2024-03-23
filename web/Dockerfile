FROM php:8.3.3-apache
RUN docker-php-ext-install mysqli
WORKDIR /var/www/html
COPY /app .
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-scripts
EXPOSE 8000
CMD ["php", "-S", "0.0.0.0:8000"]

