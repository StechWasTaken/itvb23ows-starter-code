FROM php:8.3.3-apache
RUN docker-php-ext-install mysqli
COPY /src /var/www/html
WORKDIR /var/www/html
EXPOSE 8000
CMD ["php", "-S", "0.0.0.0:8000"]
