@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-xl font-bold mb-4">新しい記事を作成</h1>

    <!-- エラーメッセージの表示 -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong>エラーが発生しました。</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- 記事作成フォーム -->
    <form action="{{ route('blogs.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">タイトル</label>
            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">タグ</label>
            <div class="grid grid-cols-3 gap-2">
                @foreach(App\Models\Tag::all() as $tag)
                    <label class="flex items-center space-x-3">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-checkbox h-5 w-5 text-blue-600">
                        <span class="text-gray-700 text-sm">{{ $tag->tag_name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="mb-4">
            <label for="body" class="block text-gray-700 text-sm font-bold mb-2">本文</label>
            <textarea name="body" id="body" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
        </div>

        <!-- ここにタグの入力フィールドを追加する場合もある -->

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">投稿する</button>
    </form>
</div>
@endsection