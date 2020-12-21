<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> SSE - @yield('title')</title>
  <link href='{{url('assets/images/logo_see_contenido.png')}}' rel='shortcut icon' type='image/png'>
  <link href="{{ url('css/main.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900');

    html,
    body {
      background-image: url("{{url('assets/images/portada.JPG')}}");

      background-repeat: no-repeat;
      background-position: top center;
      background-size: cover;
      background-attachment: fixed;

      height: 100%;
      /* responsive height */
      font-family: 'Roboto', sans-serif;
    }

    .container {
      height: 100%;
      align-content: center;
    }

    .card {

      margin-top: auto;
      margin-bottom: auto;
      width: 450px;
      background-color: rgba(0, 0, 0, 0.795) !important;
    }

    .card-header h3 {
      color: white;
    }


    .input-group-prepend span {
      width: 50px;
      background-color: #FFC312;
      color: black;
      border: 0 !important;
    }

    input:focus {
      outline: 0 0 0 0 !important;
      box-shadow: 0 0 0 0 !important;

    }

    .login_btn {
      color: black;
      background-color: #FFC312;
      width: 100px;
    }

    .login_btn:hover {
      color: black;
      background-color: white;
    }

    .links {
      color: white;
    }

    .links a {
      margin-left: 4px;
    }
  </style>
  @yield('style')

</head>

<body class="login-page" style="min-height: 440.391px;">


  <div style="background-color: rgb(255, 255, 255);">
    <div class="container">

      <div class="row">

        <div class="text-left col-6">
          <img ng-style="{ }" alt="image"
            src="https://akdemic.blob.core.windows.net/portal-web/unjbg/ingenieria-geologica-geotecnia/section/c2909719-d8de-4e37-97d3-42137a7651cf.png"
            style=" min-height: 40px;height: 5vw">

        </div>
        <div class="justify-content-end col-6 align-items-center d-flex">
          <a class="font-weight-bold" href="http://esge.unjbg.edu.pe/ ">INICIO</a>
          <a class="font-weight-bold ml-3 " href="http://esge.unjbg.edu.pe/cont%C3%A1ctenos ">CONTÁCTENOS</a>
        </div>

      </div>

    </div>

  </div>


  <div class="login-box text-center ">

    <div class="container mt-5">
      <div class="row justify-content-center">

        <div class="card">
          <div class="card-body">
            <h4 class="text-warning mt-1"> SISTEMA DE SEGUIMIENTO AL EGRESADO</h4>
            <img src="{{url('assets/images/sse.png')}}" style="width: 90px !important; margin: 0 10px 10px 5px;"
              alt="LOGO SSE">

            @yield('content')
          </div>
        </div>
      </div>
    </div>










    <!-- Essential javascripts for application to work-->
    <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('js/popper.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/main.js') }}"></script>

    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ url('js/plugins/pace.min.js') }}"></script>
    <!-- Page specific javascripts-->


    @yield('script')


    <!-- Google analytics script-->

</body>

</html>