FROM php:8.1-cli

WORKDIR /var/www/html
COPY . .

CMD ["php", "-S", "0.0.0.0:10000"]



FROM php:8.2-cli

# התקנת Composer
RUN apt-get update && apt-get install -y unzip git && \
    curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# העתקת קבצים
WORKDIR /app
COPY . .

# התקנת תלויות PHP
RUN composer install

# הפעלת שרת PHP ב־Render
CMD ["php", "-S", "0.0.0.0:10000", "send-email.php"]
