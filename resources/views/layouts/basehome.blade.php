
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- <title>AdminLTE 3 | Top Navigation</title> --}}
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Panaderia Elias</title>
  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet"  href="{{asset('/vendor/plugins/fontawesome-free/css/all.min.css')}}">
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="{{asset('/vendor/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/vendor/dist/css/adminlte.css')}}">
  {{-- <link rel="stylesheet" href="{{asset('/vendor/dist/css/adminlte.min.css')}}"> --}}
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  @php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

  @if (config('adminlte.use_route_url', false))
      @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
  @else
      @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
  @endif

</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{ url('/') }}" class="navbar-brand">
        <img src="{{asset('/vendor/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Panaderia Elias</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">Panes</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Contacto</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Categorias</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Caseros </a></li>
              <li><a href="#" class="dropdown-item">Integrales</a></li>
              <li><a href="#" class="dropdown-item">Harina</a></li>
              <li><a href="#" class="dropdown-item">Queques</a></li>

              <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                  </li>

                  <!-- Level three dropdown-->
                  <li class="dropdown-submenu">
                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                    </ul>
                  </li>
                  <!-- End Level three -->

                  <li><a href="#" class="dropdown-item">level 2</a></li>
                  <li><a href="#" class="dropdown-item">level 2</a></li>
                </ul>
              </li>
              <!-- End Level two -->
            </ul>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        
        @guest
        @else
        <li class="nav-item dropdown">
          @if (Auth::user()->hasRole('Cliente') or Auth::user()->hasRole('Administrador') or Auth::user()->hasRole('Repartidor'))
            @if (Auth::user()->hasRole('Cliente'))
            <a href="{{asset('administracion')}}"  class="dropdown-item">
              <i class="fas fa-file mr-2"></i> Historico
            </a>   
            @endif
            @if (Auth::user()->hasRole('Administrador'))
            <a href="{{asset('administracion')}}"  class="dropdown-item">
              <i class="fas fa-file mr-2"></i> Administracion
            </a> 
            @endif
            @if (Auth::user()->hasRole('Repartidor'))
            <a href="{{asset('administracion')}}"  class="dropdown-item">
              <i class="fas fa-file mr-2"></i> Delivery
            </a>   
            @endif 
          @else
            <a href="{{asset('administracion')}}"  class="dropdown-item">
              <i class="fas fa-file mr-2"></i> Area
            </a>
          @endif
        </li>            
        @endguest
        
        @guest
         
        @else
          @if (Auth::user()->hasRole('Cliente'))
            <li class="nav-item dropdown">
              <a class="nav-link" href="{{route('cart.checkout')}}">
                <i class="fa fa-shopping-cart"></i>
                 @if (count(Cart::getContent()))
                  <span class="badge badge-warning navbar-badge"id="ContadorCart" >{{count(Cart::getContent())}}</span>
                @else 
                  <span class="badge badge-warning navbar-badge" id="ContadorCart">0</span>
                @endif
              </a>
            </li>
          @endif
        @endguest

          <!-- Iniciar Sesion -->
        <li  class="nav-item dropdown">
          <a  class="nav-link" data-toggle="dropdown" href="#">
             <i class="far fas fa-user-circle"></i>
          </a> 
          @guest
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          @if (Route::has('login'))
            <div class="dropdown-divider"></div>
            <a href="{{ route('login') }}" class="dropdown-item">
                <i class="fas fa-sign-in-alt mr-2"></i>{{ __('Login') }}
            </a>
          @endif
            @if (Route::has('register'))
                <div class="dropdown-divider"></div>
                <a href="{{ route('register') }}" class="dropdown-item ">
                    <i class="fas fa-address-card mr-2"></i>{{ __('Register') }}
                </a>
          @endif
        
          @else 
          <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white"
                    style="background: url({{asset('/vendor/images/photo1.png')}}) center center;">
                <h3 class="widget-user-username text-right">{{Auth::user()->name}}</h3>
                <h5 class="widget-user-desc text-right">{{ Auth::user()->roles[0]->name  }}</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="{{asset('/vendor/images/user.png')}}" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <a href="{{asset('perfil')}}/{{Auth::user()->id}}"  class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> Perfil
                      </a>
                    {{--  <a href="{{$password_reset_url}}"  class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> editar
                      </a>
                    --}}  
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <a href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form> 
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                
              </div>
            </div>
          </div>
        </li>
        @endguest




        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
              class="fas fa-th-large"></i></a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

{{-- Contenedor --}}
    @yield('content')
{{-- Fin Contenedor --}}

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->


<!-- REQUIRED SCRIPTS -->
<!-- jQuery --><!-- autocomplete de venta -->
{{-- <script src="../../plugins/jquery/jquery.min.js"></script> --}}
<script src="{{asset('/vendor/js/jquery-3.5.1.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('/vendor/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/vendor/dist/js/adminlte.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('/vendor/plugins/select2/js/select2.full.min.js')}}"></script>


<script>

  $(document).ready(function(){
  $.ajax({
        url:'{{url('')}}/carrito-leer',
        method:"GET",
        success: function(resultado){
            if (resultado == 0) {
            }
            else{
                var resultado= JSON.parse(resultado);
                if (resultado.datos) {
                  $("#ContadorCart").html(resultado.datos);
                }
            }
        }
    });
});
var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
</script>

</body>
</html>
