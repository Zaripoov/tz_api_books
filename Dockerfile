FROM php:8-fpm

# Куда же без composer'а.
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    wget \
    git \
    vim \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libzip-dev \
    libpq-dev \
    libicu-dev \
    libmcrypt-dev \
    libssl-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install mysqli iconv pdo pdo_mysql mbstring zip exif pcntl bcmath gd intl
RUN docker-php-ext-enable intl mysqli pdo pdo_mysql gd mbstring zip
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-configure intl

# Добавим свой php.ini, можем в нем определять свои значения конфига
ADD docker-compose/php/php.ini /usr/local/etc/php/conf.d/40-custom.ini

# Set working directory
WORKDIR /var/www

CMD ["php-fpm"]
