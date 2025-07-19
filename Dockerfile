FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy all files
COPY . .

# Move public files to Apache's web root
RUN mv public/ /tmp/public/ && \
    rm -rf /var/www/html/* && \
    mv /tmp/public/* /var/www/html/

# Expose port 10000
EXPOSE 10000

# Start PHP development server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "/var/www/html"]