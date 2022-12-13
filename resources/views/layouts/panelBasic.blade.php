<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
     {{config('app.name')}} | @yield('title')
  </title>
  <!-- Favicon -->
  <link href="{{asset('img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet" />
  <link href="{{asset('js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{asset('css/argon-dashboard.css?v=1.1.2')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body class="">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        @if(isset($titulo))
        <!-- Brand -->
        <div>
          <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">@yield('title')</a>
          
          <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" style="margin-left: 40px" href="{{route('home')}}"><i class="fas fa-notes-medical" style="font-size: 24px"></i></a>
        </div>
        
        @else
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{route('home')}}">@yield('title')</a>
        <!-- Form -->
         
          <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" action="{{route('home.buscar')}}" method="POST">
            @csrf
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Buscar por Nombre o Cédula" type="text" name="buscar">
              </div>
            </div>
          </form>
        @endif
        <!-- User  para escritorio-->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <!-- Avatar -->
                @include('includes.panel.avatarPanel')
                
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Dr.{{auth()->user()->name}} </span>
                </div>
              </div>
            </a>
            @include('includes.panel.userOptions')
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary-change pb-8 pt-4 pt-md-6">
      
    </div>
    <!-- librerias para modal-delete necesarias, deben ser definidas antes del 'content' -->
    @yield('modal-delete')  

    <div class="container-fluid mt--7">
      @yield('content')
      <!-- Footer -->
      @include('includes.panel.footer')
    </div>
  </div>
  <!--   Core   -->
  <script src="{{asset('js/plugins/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!--   Optional JS   -->
  <script src="{{asset('js/plugins/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('js/plugins/chart.js/dist/Chart.extension.js')}}"></script>

  <!-- Scripts -->
  @yield('scripts')
  
  <!--   Argon JS   -->
  <script src="{{asset('js/argon-dashboard.min.js?v=1.1.2')}}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  </script> 
  <script>

    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>

</body>

</html>