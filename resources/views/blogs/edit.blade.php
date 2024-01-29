{{-- ブログ編集ページ --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-xl font-bold mb-4">記事を編集</h1>

    {{-- 記事編集フォーム --}}
    <form action="{{ route('blogs.update', $blog) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">タイトル</label>
            <input type="text" name="title" id="title" value="{{ $blog->title }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">タグ</label>
            <div class="grid grid-cols-3 gap-2">
                @foreach(App\Models\Tag::all() as $tag)
                    <label class="flex items-center space-x-3">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                            {{ in_array($tag->id, $blog->tags->pluck('id')->toArray()) ? 'checked' : '' }}
                            class="form-checkbox h-5 w-5 text-blue-600">
                        <span class="text-gray-700 text-sm">{{ $tag->tag_name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="mb-4">
            <label for="body" class="block text-gray-700 text-sm font-bold mb-2">本文</label>
            <textarea name="body" id="body" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $blog->body }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">更新する</button>
    </form>
</div>
@endsection