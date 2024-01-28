{{-- ユーザープロフィールページ --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-xl font-bold mb-4">あなたの投稿した記事一覧</h1>

    <div class="articles">
        @foreach ($user->blogs as $blog)
            <div class="article mb-4 p-4 bg-white rounded shadow" id="article-{{ $blog->id }}">
                <h2 class="text-lg font-bold">{{ $blog->title }}</h2>
                <p>{{ Str::limit($blog->body, 100) }}</p>
                <div class="actions flex justify-end space-x-4">
                    <a href="{{ route('blogs.edit', $blog) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">編集</a>
                    <div x-data="blogManager()">
                        <button @click="deleteBlog({{ $blog->id }})" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">削除</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/deleteBlog.js') }}"></script>
@endsection