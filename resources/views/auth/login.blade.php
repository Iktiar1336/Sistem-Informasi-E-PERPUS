<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Halaman Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{URL::asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>
  <!-- Custom styles for this template-->
  <link href="{{URL::asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

  <style>
      .bg-gradient{
          background: url('{{asset('gambar/bg.jpeg')}}');
          background-size: cover;
          background-repeat: no-repeat;
      }
      .bg-logo{
          background: #33ccff;
      }
  </style>

</head>

<body class="bg-gradient">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center" style="margin-top: 60px;">

      <div class="col-xl-10 col-lg-11 col-md-10">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-5 d-none d-lg-block bg-logo">
                  <center>
                    <img src="{{asset('gambar/eperpus.png')}}" width="80%" height="80%" style="margin-top: 130px;margin-left:10px" alt="">
                  </center>
                  <div id="typed-strings">
                    <span><h4 style="text-align: center;margin-top:30px;color: #003366;font-weight:bold;font-family: Comic Sans;">Sistem Informasi E-PERPUS</h4></span>
                  </div>
                  <span id="typed" style="white-space:pre;"></span>
              </div>
              <div class="col-md-7">
                <div class="pt-5 pl-5 pr-5 pb-3">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" role="form" method="POST" action="{{ url('/login') }}">
                  {{ csrf_field() }}
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" autocomplete="username" required name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username...">
                      @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" id="exampleInputPassword" autocomplete="current-password" required placeholder="Password">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ __('Login') }}
                    </button>

                    <center>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </center>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{URL::asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{URL::asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <script src="{{URL::asset('lib/typed.js')}}" type="text/javascript"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{URL::asset('js/sb-admin-2.min.js')}}"></script>
  
  <script src="{{URL::asset('js/demos.js')}}"></script>

  <script src="{{asset('js/sweetalert.min.js')}}"></script>

  @if (session('error'))
  <script>
          swal("{{ session('error') }}",{
              title: "Gagal",
              icon: "error",
          });
  </script>
  @endif
</body>

</html>
