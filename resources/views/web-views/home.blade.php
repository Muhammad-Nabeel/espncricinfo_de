@extends('layouts.front-end.app')

@section('title', 'ESPN CRICINFO')
 
@section('content')



<div class="index-content">
    <div class="row flex-row gx-0 pt-4">
        <div class="col-sm-12 col-md-7 position-relative">
            <div class="sec-banner-style-1">
            </div>
            <div class="sec-content-style-1 position-absolute w-100 p-3 d-none">
                <p class="game-type d-block text-white h6"></p>
                <p class="game-title d-block text-white h3"></p>
                <p class="posted-time d-block text-white h6"></p>
            </div>
        </div>
        <div class="col-sm-12 col-md-5 p-3">
            <p class="h4">TOP STORIES</p>
            <hr />
            <div id="showrightpost" class="row flex-column gx-0 ">
            @include('layouts.front-end.partials._preloader')
            </div>
        </div>
    </div>
    <h2 class="m-2">MORE NEWS</h2>
    <div id="morenews" class="row flex-row gx-0 row flex-row gx-0 justify-content-around">
    @include('layouts.front-end.partials._preloader')
    </div>
</div>
@endsection

