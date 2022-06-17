
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- <link rel="icon" href="{{asset('/vendor/images/icono.png')}}" sizes="32x32" /> --}}
  <title>Panaderia</title>

<!-- autocomplete de venta -->
<script src="{{asset('/vendor/js/jquery-3.5.1.min.js')}}"></script>
 <script src="{{asset('/vendor/js/jquery-ui/jquery-ui.min.js')}}"></script> 
 <link href="{{asset('/vendor/js/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet"/>
  <!-- / autocomplete de venta -->

  <script type="text/javascript"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('/vendor/dist/css/css.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/vendor/plugins/fontawesome-free/css/all.min.css')}}">
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="{{asset('/vendor/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/vendor/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('/vendor/dist/css/boton.css')}}">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{asset('/vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- CSS PARA EL INPUT DATE Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('/vendor/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- ChartJS -->
  <script src="{{asset('/vendor/plugins/chart.js/Chart.min.js')}}"></script>

</head>
 
<!--<body class="hold-transition layout-fixed sidebar-collapse sidebar-mini-md layout-navbar-fixed">  layout-navbar-fixed --FIJA EL NAV-->
<body class="layout-fixed sidebar-mini-md layout-navbar-fixed">  <!--layout-navbar-fixed --FIJA EL NAV-->
 
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- NAV PERFIL -->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link" data-toggle="dropdown">
         <i class="fas fa-user-cog"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header">
            <img src="{{asset('/vendor/images/user.png')}}" class="img-circle elevation-2" alt="User Image">
            <p>
               {{Auth::user()->name}}
              <small clasS="text-muted">Montero -  {{date('d-m-Y');}} </small>
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            <div class="row">
              <div class="col-5 text-center">
                <div id="#modo">
                  <div class="centrar-verticalmente">
                    <label class="theme-switch" for="checkbox">
                      <input type="checkbox" id="checkbox"/>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-7 ">
                  <p href="#"><i class="fas fa-moon mr-2"></i> Modo oscuro</p>
              </div>
            </div>
            <!-- /.row -->

          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="/usuarios/cargar_perfil" class="btn btn-default btn-flat"><i class="fas fa-user mr-2"></i>Perfil</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat float-right"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                @csrf
            </form>
          </li>
        </ul>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
   
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link">
      <img src="{{asset('/vendor/images/user.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold font-weight-light">Panaderia</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/vendor/images/user.png')}}" class="img-circle elevation-2" alt="User Image"> 
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-utensils"></i>
              <p>
                Productos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ asset('producto') }}" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('categoria')}}" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                  <p>Categorias</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Clientes
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Producción
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="far fa-dot-circle nav-icon"></i>
                  <p>Nueva producción</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                 <i class="far fa-dot-circle nav-icon"></i>
                  <p>Terminados</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Pedidos
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Administración
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
 
              <li class="nav-item">
                <a href="{{asset('administracion')}}" class="nav-link">
                 <i class="far fa-dot-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('administracion/roles')}}" class="nav-link">
                 <i class="far fa-dot-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-header">REPORTES</li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Reportes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Stock mínimos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Rango de fechas</p>
                </a>
              </li>

            </ul>
          </li>
 
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Gráficos
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  {{-- FIN DEL HEADER --}}

  @yield('content')

  {{-- INICIO DEL FOOTER --}}
  
  <footer class="main-footer text-sm">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 2.0.1-rc
    </div>
    <strong>Copyright &copy; 2022 <a href="https://www.facebook.com/EnriquePlayer" target="_blank">kike_programmer</a>.</strong> Todos los derechos reservados.
  </footer>

</div><!-- ./wrapper -->

<!-- Bootstrap 4 -->
<script src="{{asset('/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('/vendor/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/vendor/dist/js/adminlte.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('/vendor/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- jquery-validation -->
<script src="{{asset('/vendor/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('/vendor/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<!-- bs-custom-file-input photo-->
<script src="{{asset('/vendor/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- Plantilla principal -->
<script src="{{asset('/vendor/dist/js/plantilla.js')}}"></script>
<!-- ========================= JS PARA EL DATA FECHA ========================= -->
<!-- Select2 -->
<script src="{{asset('/vendor/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('/vendor/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('/vendor/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('/vendor/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<script>
/*========================= COMPLEMENTO DATATABLES ===========================*/
$(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,//view nro
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "deferRender": true,//
      "retrieve": true,
      "processing": true,//
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "lengthMenu": "Mostrar _MENU_ entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
    });
  });
//tooltips
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
$(document).ready(function() {
    $("table").tooltip({
        selector: '[rel="tooltip"]'
    });
});
</script>

</body>
</html>


  {{-- FIN DEL FOOTER --}}
