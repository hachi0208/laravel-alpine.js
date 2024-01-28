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
            <label for="tags" class="block text-gray-700 text-sm font-bold mb-2">タグ（shiftを押しながら複数選択してください）</label>
            <select name="tags[]" id="tags" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" multiple>
                @foreach(App\Models\Tag::all() as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                @endforeach
            </select>
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