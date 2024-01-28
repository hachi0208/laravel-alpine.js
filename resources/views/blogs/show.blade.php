@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">{{ $blog->title }}</h1>
        <p>{{ $blog->body }}</p>
        <a href="{{ url('/') }}" class="text-blue-500">戻る</a>
    </div>
</div>
@endsection