FROM php:8.2-fpm

# Define o diretório de trabalho dentro do container
WORKDIR /var/www

# Remove o diretório html padrão
RUN rm -rf /var/www/html

# Instala as dependências necessárias
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    apt-utils \
    libonig-dev

# Instala as extensões do PHP
RUN docker-php-ext-install zip pdo_mysql mbstring exif
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install gd

# Instala a extensão Redis
RUN mkdir -p /usr/src/php/ext/redis; \
    curl -fsSL https://pecl.php.net/get/redis --ipv4 | tar xvz -C "/usr/src/php/ext/redis" --strip 1; \
    docker-php-ext-install redis;

# Instala o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Cria um grupo e um usuário para o Laravel
RUN groupadd -g 1000 laravel
RUN useradd -u 1000 -ms /bin/bash -g laravel user

COPY --chown=user:laravel . /var/www

# Define o usuário que será utilizado para rodar o container
USER user

# Comando para iniciar o PHP-FPM
CMD ["php-fpm"]