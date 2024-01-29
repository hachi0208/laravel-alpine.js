# PHP-FPM のイメージをベースに使用
FROM php:8.0-fpm

# Laravel が必要とする PHP 拡張機能をインストール
RUN docker-php-ext-install pdo pdo_mysql

# Composer をインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

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
