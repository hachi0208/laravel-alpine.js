# PHP-FPM のイメージをベースに使用
FROM php:8.0-fpm

# 必要なパッケージをインストール
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && rm -rf /var/lib/apt/lists/*

# PHP の zip 拡張をインストール
RUN docker-php-ext-install zip pdo pdo_mysql

# Composer をインストール
COPY --from=composer:2.0.8 /usr/bin/composer /usr/bin/composer

# アプリケーションのソースコードをコピー
COPY . /var/www



# カレントディレクトリを設定
WORKDIR /var/www

# Composer を使用して依存関係をインストール
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist

# 権限を設定
RUN chown -R www-data:www-data /var/www

# 実行権限を付与
RUN chmod +x ./init.sh
