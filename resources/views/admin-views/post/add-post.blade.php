@extends('layouts.back-end.app')
@section('title', 'Add Post')

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')

<link  rel="stylesheet" href="{{asset('/assets/back-end')}}/css/fileUpload.css" />


<div class="container mt-5">
    <h2>Create Post</h2>
    <form id="addPostForm" action="{{ route('admin.add_post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="postTitle">Post Title</label>
            <input type="text" class="form-control" id="postTitle" name="PostTitle" placeholder="Enter Post Title">
        </div>
        <div class="form-group">
            <label for="postDescription">Post Description</label>
            <textarea class="form-control" id="postDescription" name="PostDescription" rows="3" placeholder="Enter Post Description"></textarea>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select id="category" name="categoryId" class="form-control">
                @foreach ($categories as $categoryId => $categoryTitle)
                    <option value="{{ $categoryId }}">{{ $categoryTitle }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="postMedia">Post Media</label>
            <input type="text" class="form-control" id="postMedia" name="PostMedia" placeholder="Enter Post Media URL">
        </div>
        <div class="form-group">
            <label for="postMediaType">Post Media Type</label>
            <select id="postMediaType" name="PostMediaType" class="form-control">
                <option value="video">Video</option>
                <option value="image">Image</option>
            </select>
        </div>
        <div class="form-group">
            <label for="postThumb">Post Thumbnail</label>
            <div class="parent-div">
                <div id="fileUpload"></div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{asset('/assets/back-end')}}/js/fileUpload.js" > </script>
<script>
    $(document).ready(function ($) {
        $("#fileUpload").fileUpload();
    });

    function submitForm() {
        // Create a FormData object to send the form data
        var formData = new FormData(document.getElementById('addPostForm'));

        $.ajax({
            type: 'POST',
            url: '{{ route('admin.add_post') }}',
            processData: false,
            contentType: false,
            data: formData,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (response) {
                console.log(response);
                // Handle success, e.g., show a success message to the user
            },
            error: function (error) {
                console.error(error);
                // Handle error, e.g., show an error message to the user
            }
        });
    }
</script>

@endsection
