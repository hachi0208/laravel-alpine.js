# マイグレーションとシーディング
php artisan migrate:reset
php artisan migrate
php artisan db:seed --class=TagsSeeder
php artisan db:seed --class=UserSeeder
php -d memory_limit=512M artisan db:seed --class=BlogsSeeder
