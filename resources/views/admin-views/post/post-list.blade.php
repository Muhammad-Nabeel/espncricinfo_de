@extends('layouts.back-end.app')
@section('title', 'Post List')

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')

<div class="container">
    <h1 class="mt-4">Post List</h1>

    @foreach ($posts as $post)

    @php
        $postThumbArray = json_decode($post->PostThumb, true);
        $postThumb = isset($postThumbArray[0]) ? $postThumbArray[0] : null;
    @endphp


    <div class="card mb-4">
        <div class="row no-gutters">
        <div class="col-md-4">
        <img src="{{ asset('storage/post_thumbnail') }}/{{ $postThumb }}" class="card-img" width="100" alt="Post Thumbnail">
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <h2 class="card-title">{{ $post->PostTitle }}</h2>
            <p class="card-text">{{ $post->PostDescription }}</p>
            <!-- Add other post details as needed -->
        </div>
        </div>
    </div>
    </div>
    @endforeach
</div>
@endsection
