@extends('layouts.app')

@section('content')
<div class="container mx-auto">

    <div class="mb-4">
        <a href="{{ route('blogs.index') }}" class="text-blue-500 hover:text-blue-700">ページネーションモードへ</a>
    </div>

    <div id="blog-container">
        <!-- ブログポストの表示エリア -->
    </div>

</div>
@endsection

@section('scripts')
<script src="{{ asset('js/blogLoader.js') }}"></script>
@endsection