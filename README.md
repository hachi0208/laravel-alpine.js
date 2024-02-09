# 構築するためのコマンド

このリポジトリに環境変数も含まれています。

このリポジトリをインストール後・・・

```cd laravel-alpine.js```

```docker-compose up -d --build```

```docker-compose exec app /bin/bash -c "./init.sh"```

これでlocalhost:8000で確認できると思います。

また、seederを使って最初からデータを少し入れています。


# 動作説明

ログインしなくてもできる作業
- http://localhost:8000/
- http://localhost:8000/scroll

  でのデータのget（これ以外はログインが必要です）

localhost:8000/、localhost:8000/scrollでは主にデータのgetのみを行っている。「続きを読む」を押せばその記事の続きが読める。

<img width="700" alt="スクリーンショット 2024-01-29 15 20 50" src="https://github.com/hachi0208/laravel-alpine.js/assets/114277057/0a0f1e2e-57d4-4118-81ee-74a4d2069608">

<img width="700" alt="スクリーンショット 2024-01-29 15 22 12" src="https://github.com/hachi0208/laravel-alpine.js/assets/114277057/1293d082-e624-4873-a2ed-b6f306127113">




ヘッダーの「記事の投稿」を押せば localhost:8000/blogs/create に遷移する。

ここで新しく記事を作成できる。

<img width="700" alt="スクリーンショット 2024-01-29 15 23 28" src="https://github.com/hachi0208/laravel-alpine.js/assets/114277057/859718c8-27f8-477d-9227-21a3551309cc">




ヘッダーの「ユーザーページ」を押せば localhost:8000/blogs/create に遷移する。
ここで自分が作った記事について編集、削除できる。

<img width="700" alt="スクリーンショット 2024-01-29 15 24 31" src="https://github.com/hachi0208/laravel-alpine.js/assets/114277057/8a1ec2e8-0977-49e6-995a-ced8e93d639c">

削除については確認画面が出て記事が消えるだけだが、編集を押すと次の画面に遷移する。

<img width="700" alt="スクリーンショット 2024-01-29 15 25 49" src="https://github.com/hachi0208/laravel-alpine.js/assets/114277057/ae4b25b5-9a6f-430c-821c-8eaf6e1b9a44">

ここで記事の編集をして「更新する」を押すとその記事のページに遷移する。



# アピールポイント

- ユーザーページであなたが投稿した記事一覧のところで削除ボタンを押した時にalpine.jsとlaravelのapiを用いて非同期処理を行い、リロードせずにデータを反映させた
- DBの設計でuserとblogを１対多で構築、blogとtagを多対多で構築した







# 開発メモ


## 便利なコマンド


### local で開発

css、js の変化を検知。

npm run watch

立ち上げ

php artisan serve

## docker

起動

docker-compose up -d --build

docker-compose exec app /bin/bash -c "./init.sh"

再ビルドの際にキャッシュクリア

docker-compose build --no-cache

docker 内にアクセス

docker compose exec app bash

docker-compose exec db bash

mysql -u root -p

停止

docker-compose.yml ファイルで定義されたサービス（コンテナ）を停止、削除も？

docker compose down

コンテナ止める

docker stop d6d56dc8a528

docker rm d6d56dc8a528

image について

docker images

docker rmi <image_id_or_name>

または全部消したいとき

docker rmi $(docker images -q)

docker rmi $(docker images -q) -f

# めも

公式入り口

laravel : https://laravel.com/docs/8.x

alpine : https://alpinejs.dev/start-here


databaseについて : https://laravel.com/docs/8.x/eloquent-relationships

Eloquent のメソッド代表例　 : https://qiita.com/asami___t/items/aabeb0d544f1e8680721

::query について　 : https://qiita.com/fujita-goq/items/2279bb947ec4e7b103b2

コントローラーの store について : https://qiita.com/EasyCoder/items/e6ca6658ffcf08e6d912

docker : https://qiita.com/ucan-lab/items/56c9dc3cf2e6762672f4

















<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[Many](https://www.many.co.uk)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[OP.GG](https://op.gg)**
-   **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
-   **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
