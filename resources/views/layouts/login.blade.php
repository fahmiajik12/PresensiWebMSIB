<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Font Awesome -->
  <script defer src="{{ asset('public/js/all.js') }}"></script>
  
  <!-- Bootstrap & Custom CSS -->
  <link href="{{ asset('public/css/bootstrap/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">

  <!-- Animate CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <!-- Icon -->
  <link rel="icon" type="image/png" href="{{ asset('public/img/Unimma.png') }}"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
  <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    
    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
    </style>
</head>

<body class="bg-primary">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <div class="row align-items-center">
                  <div class="col-lg-6 d-none d-lg-block" style="padding-left: 50px;">
                    <div class="top-left links mt-4">
                        <a class="btn btn-primary" href="{{ url('/') }}">Home</a>
                    </div>
                    <div class="text-center">
                        <h1 class="h2 text-gray-900 mb-4 font-weight-bold">Welcome</h1>
                      </div>
                    <img src="{{ asset('public/img/logo.png') }}" class="bg-login-image animate__animated animate__backInLeft mb-5" alt="">
                  </div>
                  <div class="col-lg-6">
                    <div class="p-5">
     
                        @yield('container')
                        <div class="text-center">
                        &nbsp;<span class="small">Copyright &copy; Sistem Presensi Siswa</span>
                     </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
 </div>
</div>
  <!-- Bootstrap core JavaScript-->
  <script defer src="{{ asset('public/js/jquery.min.js') }}"></script>
  <script defer src="{{ asset('public/js/bootstrap.bundle.min.js') }}"></script>
  <script defer src="{{ asset('public/js/bootstrap.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script defer src="{{ asset('public/js/jquery.easing.min.js') }}"></script>
</body>

</html>