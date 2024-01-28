@extends('layouts.app')

@section('content')
<div class="container mx-auto">

    <div class="mb-4">
        <a href="{{ url('/') }}" class="text-blue-500 hover:text-blue-700">インフィニティスクロールモードへ</a>
    </div>

    <div class="flex flex-col gap-4">
        <h2 class="text-xl font-bold">tagでフィルター</h2>
        <form action="{{ route('blogs.pagenation') }}" method="GET" class="w-full">
            <select name="tag" onchange="this.form.submit()" class="w-full bg-white border border-gray-300 rounded-lg text-gray-700 py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-300">
                <option value="">全てのタグ</option>
                @foreach(App\Models\Tag::all() as $tag)
                    <option value="{{ $tag->id }}" {{ request('tag') == $tag->id ? 'selected' : '' }}>
                        {{ $tag->tag_name }}
                    </option>
                @endforeach
            </select>
        </form>

        <div class="m-5">
            {{ $blogs->links() }}
        </div>

        <div class="grid grid-cols-3 gap-4 mb-20">
            @foreach ($blogs as $blog)
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-bold">{{ $blog->title }}</h2>
                    <p>{{ Str::limit($blog->body, 100) }}</p>
                    <a href="{{ route('blogs.show', $blog) }}" class="text-blue-500">続きを読む</a>
                    <div class="mt-4">
                        <p class="text-gray-600 text-sm">作成者: {{ $blog->author->name ?? '不明' }}</p>
                        <p class="text-gray-600 text-sm">作成日: {{ $blog->created_at->format('Y-m-d') }}</p>
                    </div>
                    <!-- タグの表示 -->
                    <div class="mt-2">
                        @foreach ($blog->tags as $tag)
                            <span class="inline-block bg-blue-200 text-blue-800 text-xs px-3 rounded-full uppercase font-semibold tracking-wide">
                                {{ $tag->tag_name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection