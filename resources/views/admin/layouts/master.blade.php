<!DOCTYPE html>
<html lang="es">

<head>

  <link href='{{url('assets/images/logo_see_contenido.png')}}' rel='shortcut icon' type='image/png'>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> SSE - Administrador - @yield('title')</title>

  <link href="{{ url('css/main.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



  @yield('style')

  <!-- <link href="{{ url('assets/bootstrap/css/bootstrap-theme.min.css') }}" rel="stylesheet"> -->
</head>

<body>

  <div class="app sidebar-mini">
    @include('admin.partials.navbar')

    @include('admin.partials.sidebar')

    <main class="app-content">
      @yield('breadcrumb')
      @yield('content')

    </main>

  </div>




  <!-- jQuery -->

  <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ url('js/popper.min.js') }}"></script>
  <script src="{{ url('js/bootstrap.min.js') }}"></script>


  <!-- The javascript plugin to display page loading on top-->
  <script src="{{ url('js/plugins/pace.min.js') }}"></script>
  {{-- datatables --}}
  <!-- Page specific javascripts-->
  <script type="text/javascript" src="{{ url('js/plugins/chart.js') }}"></script>
  <script src="{{ url('js/main.js') }}"></script>
  @yield('script')



</body>

</html>