FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy ALL files (except those in .dockerignore)
COPY . .

# Fix permissions
RUN chown -R www-data:www-data /var/www/html

# Update include paths in PHP configuration
RUN echo "include_path = '.:/usr/local/lib/php:/var/www/html'" >> /usr/local/etc/php/conf.d/path.ini

# Expose port 10000
EXPOSE 10000

# Start Apache (or use PHP built-in server)
CMD ["php", "-S", "0.0.0.0:10000", "-t", "/var/www/html/public"]