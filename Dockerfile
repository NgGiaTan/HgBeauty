# Sử dụng image PHP với Apache
FROM php:7.4-apache

# Cài đặt các extension PHP cần thiết (ví dụ MySQL và PDO)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Cài đặt Composer nếu cần
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy mã nguồn của bạn vào thư mục gốc của container
COPY . /var/www/html/

# Cấu hình thư mục public nếu cần (nếu public là thư mục gốc)
# WORKDIR /var/www/html/public

# Mở cổng 80 cho Apache
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
