<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/assets/back-end')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('/assets/back-end')}}/css/toastr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
          @include('layouts.back-end.partials._side-bar')
      </nav>
      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
            @yield('content')
      </div>
    </div>
    @include('layouts.back-end.partials._modals')
    @include('layouts.back-end.partials._preloader')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{asset('/assets/login')}}/js/toastr.js"></script>
    {!! Toastr::message() !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
    <script src="{{asset('/assets/back-end')}}/js/popper.js"></script>
    <script src="{{asset('/assets/back-end')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('/assets/back-end')}}/js/main.js"></script>
    
    @if (isset($success) && is_array($success))
      <script>
          @foreach($success as $message)
            toastr.success('{{ $message }}');
          @endforeach
      </script>
    @endif
    <script>
        $(document).ready(function () {
          
          //toastr.success('Welcome to Dashboard');
          $('#mySelect').select2({
                multiple: false
            });
            
        });
    </script>
  </body>
</html>