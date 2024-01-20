@extends('layouts.front-end.app')

@section('title', $post->PostTitle)

 
@section('content')
<div class="post-content">
<div class="row gx-0 pt-4">
        <div class="col-12">
            <nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&quot;); '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="/{{ $post->category->CategoryTitle }}">{{ $post->category->CategoryTitle }}</a></li>
                    <li class="breadcrumb-item d-none d-md-block d-lg-block active " aria-current="page"><a href="{{ $post->slug }}">{{ $post->PostTitle }}</a></li>
                </ol>
            </nav>
        </div>
    </div>
     <div class="row flex-row gx-0 pt-4">
        {{-- Display the requested post --}}
        @if($post)
            <div class="col-sm-12 col-md-8 position-relative">
                <div class="sec-banner-style-1">
                    @if($post->PostMediaType == 'video')
                        <iframe height="520" src="{{ $post->PostMedia }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="width:100%;"></iframe>
                    @else
                        <img src="{{ $post->PostThumb }}" alt="{{ $post->title }}">
                    @endif
                </div>
                <div class="sec-content-style-1 w-100 p-3">
                    <p class="game-type d-block h6">{{ $post->category->CategoryTitle }}</p>
                    <p class="game-title d-block h3">{{ $post->PostTitle }}</p>
                    <p class="game-desc d-block h3">{!! $post->PostDescription !!}</p>
                    <p class="posted-time d-block h6">{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</p>
                </div>
            </div>

            {{-- Display related posts --}}
            <div class="col-sm-12 col-md-4 p-3">
                <p class="h4">RELATED STORIES</p>
                <hr />
                <div id="showrightpost" class="row flex-column gx-0">
                   

                    <div id="showrightpost" class="row flex-column gx-0 ">
                @foreach ($relatedPosts->slice(1)->take(3) as $post)
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
                    <a href="{{ route('category.slug', ['category' => $post->Category->CategoryTitle, 'slug' => $post->Slug]) }}" class="text-black text-decoration-none">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->PostTitle }} - {{ $post->Category->CategoryTitle }}</h5>
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
                    </div>
                    </a>
                    </div>
                </div>
                </div>
                @endforeach
            </div>

                    {{-- Show loader if no related posts are loaded --}}
                    @if($relatedPosts->isEmpty())
                        @include('layouts.front-end.partials._preloader')
                    @endif
                </div>
            </div>
        </div>
    </div>
    <h2 class="m-2">MORE NEWS</h2>
    <div id="morenews" class="row flex-row gx-0 row flex-row gx-0 justify-content-around">
        {{-- Show loader if no data is loaded --}}
        @if($relatedPosts->isEmpty())
            @include('layouts.front-end.partials._preloader')
        @endif

        @foreach ($relatedPosts as $post)
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
    @else
        <p>No posts available.</p>
    @endif
        
</div>
@endsection

