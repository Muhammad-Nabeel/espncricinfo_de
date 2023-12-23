<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>JNKWWE - Admin Login</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/assets/login')}}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('/assets/login')}}/css/signin.css" rel="stylesheet">
    <link  href="{{asset('/assets/login')}}/css/toastr.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form id="login-form" class="form-signin" action="{{route('admin.auth.login')}}"  method="post">
	  @csrf
      <img class="mb-4" src="{{asset('/assets/front-end')}}/img/logo/logo.png" alt="JNKWWE-LOGO">
      <h1 class="h3 mb-3 font-weight-normal">Admin Login</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="remember" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2023-2024</p>
    </form>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{asset('/assets/login')}}/js/toastr.js"></script>
    <!-- <script>
      document.getElementById('login-form').addEventListener('submit', function (e) {
          e.preventDefault();

          const email = document.getElementById('inputEmail').value;
          const password = document.getElementById('inputPassword').value;

          // Create a JSON object with the data
          const data = {
              email: email,
              password: password
          };

          // Make a POST request to the authentication endpoint
          fetch('/admin/auth/login-action', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
              },
              body: JSON.stringify(data)
          })
          .then(response => {
              if (response.ok) {
                  // Authentication successful
                  console.log('Authentication successful');
                  // You can handle further actions here, like redirecting the user.
              } else {
                  // Authentication failed
                  console.log('Authentication failed');
                  // You can handle error messages or actions for failed authentication here.
              }
          })
          .catch(error => {
              console.error('Error:', error);
          });
      });
  </script> -->
@if ($errors->any())
    <script>
        @foreach($errors->all() as $error)
        toastr.error('{{$error}}', Error, {
            CloseButton: true,
            ProgressBar: true
        });
        @endforeach
    </script>
@endif



  </body>
</html>