FROM richarvey/nginx-php-fpm:latest
COPY . /var/www/html
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1

# ESTA LÍNEA ES LA MAGIA: Corrige las rutas para que no salga el error 404/500
RUN sed -i 's/try_files $uri $uri\/ \/index.php?$args;/try_files $uri $uri\/ \/index.php?$query_string;/g' /etc/nginx/sites-available/default.conf

RUN composer install --no-dev