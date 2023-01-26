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

<body class="">
  {{-- @include('sweetalert::alert') --}}
  @yield('container')
  
  <!-- Bootstrap core JavaScript-->
  <script defer src="{{ asset('public/js/jquery.min.js') }}"></script>
  <script defer src="{{ asset('public/js/bootstrap.bundle.min.js') }}"></script>
  <script defer src="{{ asset('public/js/bootstrap.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script defer src="{{ asset('public/js/jquery.easing.min.js') }}"></script>
</body>

</html>