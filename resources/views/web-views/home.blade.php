@extends('layouts.front-end.app')

@section('title', 'ESPN CRICINFO')
 
@section('content')
<div class="index-content">
    <div class="row flex-row gx-0 pt-4">
    {{-- Display the first post in the specified section --}}
        @if($posts->isNotEmpty())
            @php $firstPost = $posts->first(); @endphp
            <div class="col-sm-12 col-md-8 position-relative">
                <div class="sec-banner-style-1">
                    @if($firstPost->PostMediaType == 'video')
                    <iframe height="520" src="{{ $firstPost->PostMedia }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="width:100%;"></iframe>
                    @else
                        <img src="{{ $firstPost->PostThumb }}" alt="{{ $firstPost->title }}">
                    @endif
                </div>
                <a href="{{ route('category.slug', ['category' => $firstPost->category->CategoryTitle, 'slug' => $firstPost->Slug]) }}" class="text-white text-decoration-none">
                    <div class="sec-content-style-1 position-absolute w-100 p-3">
                        <p class="game-type d-block text-white h6">{{ $firstPost->category->CategoryTitle }} </p>
                        <p class="game-title d-block text-white h3"> {{ $firstPost->PostTitle }}</p>
                        <p class="posted-time d-block text-white h6">{{ \Carbon\Carbon::parse($firstPost->created_at)->format('M d, Y') }}</p>
                    </div>
                </a>
            </div>
        @else
            <p>No posts available.</p>
        @endif
        <div class="col-sm-12 col-md-4 p-3">
            <p class="h4">TOP STORIES</p>
            <hr />
            <div id="showrightpost" class="row flex-column gx-0 ">
                @foreach ($posts->slice(1)->take(3) as $post)
                @php
                    $postThumbArray = json_decode($post->PostThumb, true);
                    $postThumb = isset($postThumbArray[0]) ? $postThumbArray[0] : null;
                @endphp
                <div class="card mb-4">
                    <div class="row no-gutters">
                    <div class="col-md-4">

                    @if($post->PostMediaType == 'video')
                        <iframe height="123" class="card-img" width="100" alt="Post Thumbnail" src="{{ $post->PostMedia }}" frameborder="0" allowfullscreen></iframe>
                    @else
                        <img src="{{ asset('storage/post_thumbnail') }}/{{ $post->PostThumb }}" alt="{{ $post->title }}">
                    @endif
    
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                    <a href="{{ route('category.slug', ['category' => $post->Category->CategoryTitle, 'slug' => $post->Slug]) }}" class="text-black text-decoration-none">
                        <h5 class="card-title">{{ $post->PostTitle }}</h5>
                        <p class="card-text">
                            @if(strlen($post->PostDescription) > 30)
                                {!! substr($post->PostDescription, 0, 30) !!}...
                                <a href="{{ route('category.slug', ['category' => $post->Category->CategoryTitle, 'slug' => $post->Slug]) }}" class="read-more">Read more</a>
                            @else
                                {!! $post->PostDescription !!}
                            @endif
                        </p>
                        <p class="card-text"><small class="text-muted">{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</small></p>
                        <!-- Add other post details as needed -->
                        </a>
                    </div>
                    </div>
                </div>
                </div>
                @endforeach

                {{-- Show loader if no data is loaded --}}
                @if($posts->isEmpty())
                    @include('layouts.front-end.partials._preloader')
                @endif
            </div>
        </div>
    </div>
    <h2 class="m-2">MORE NEWS</h2>
    <div id="morenews" class="row flex-row gx-0 row flex-row gx-0 justify-content-around">
        {{-- Show loader if no data is loaded --}}
        @if($posts->isEmpty())
            @include('layouts.front-end.partials._preloader')
        @endif

        @foreach ($posts as $post)
            @php
                $postThumbArray = json_decode($post->PostThumb, true);
                $postThumb = isset($postThumbArray[0]) ? $postThumbArray[0] : null;
            @endphp


            <div class="card col-sm-12 col-md-3 p-0 m-2">
                @if($post->PostMediaType == 'video')
                    <iframe height="200" class="card-img-top" width="100" alt="Post Thumbnail" src="{{ $post->PostMedia }}" frameborder="0" allowfullscreen></iframe>
                @else
                    <img class="card-img-top" src="{{ asset('storage/post_thumbnail') }}/{{ $post->PostThumb }}" alt="{{ $post->title }}">
                @endif
                <a href="{{ route('category.slug', ['category' => $post->Category->CategoryTitle, 'slug' => $post->Slug]) }}" class="text-black text-decoration-none">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->PostTitle }} - {{ $post->Category->CategoryTitle }}</h5>
                    <p class="card-text">
                        @if(strlen($post->PostDescription) > 100)
                            {!! substr($post->PostDescription, 0, 100) !!}...
                            <a href="{{ route('category.slug', ['category' => $post->Category->CategoryTitle, 'slug' => $post->Slug]) }}" class="read-more">Read more</a>
                        @else
                            {!! $post->PostDescription !!}
                        @endif
                    </p>

                    <p class="card-text"><small class="text-muted">{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</small></p>
                </div>
                </a>
            </div>
            @endforeach
    </div>
</div>
@endsection

