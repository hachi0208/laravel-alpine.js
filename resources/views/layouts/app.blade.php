<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <!-- vitaはなんか直せないからwebpackに置き換えた。たかが記事なのでwebpackでも読み込み速度も問題ないはず -->
        <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">


            <!-- Page Heading -->
            <header class="header">
                <div class="header-content">
                    <h1 class="blog-title">Blog</h1>
                     <div class="flex items-center space-x-20">
                        <a href="{{ route('blogs.index') }}" class="home-link text-xl text-gray-700">ホーム</a>
                        <a href="{{ route('blogs.create') }}" class="post-link text-xl text-gray-700">記事の投稿</a>
                        <a href="{{ route('blogs.index') }}" class="user-page-link text-xl text-gray-700">ユーザーページ</a>
                    </div>
                    @include('layouts.navigation')
                </div>
            </header>

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>

        {{-- 追加スクリプトのためのセクション --}}
        @yield('scripts')
    </body>
</html>
