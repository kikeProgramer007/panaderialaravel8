@extends('layouts.basehome')

@section('content')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> --}}
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Panes<small> Disponibles</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->









    <!-- Main content -->
    <div class="content">
      <div class="container">
        {{-- <div class="row"> --}}
        {{-- <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"> --}}

          <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-expanded="false">
              Right-aligned basdasdsaads
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
              <form class="px-4 py-3">
                <div class="form-group">
                  <label for="exampleDropdownFormEmail1">Email address</label>
                  <input type="email" class="form-control form-control-sm" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                </div>
                <div class="form-group">
                  <label for="exampleDropdownFormPassword1">Password</label>
                  <input type="password" class="form-control form-control-sm" id="exampleDropdownFormPassword1" placeholder="Password">
                </div>
                <div class="form-group mb-0">
                  <label for="exampleDropdownFormPassword1">categoría</label>
                </div>
                <div class="form-group">
                  <select class="form-control form-control-sm"    id="dropdownSubMenu2"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" required>
                  <option selected disabled value="">Seleccionar categoría</option>
                      <option value="2">ssssssssss</option>
                      <option value="2">xxxxxxxxxxx</option>
                      <option value="2">wwwwwwww</option>
                      <option value="2">4444</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Sign in</button>
              </form>
            </div>
          </div>
          <br><br>

            <div class="row row-cols-1 row-cols-sm-2  row-cols-md-3 row-cols-lg-4  g-3">
                @foreach ($productos as $row)
                    @php
                       $imagen = "img/productos/".$row->id.".jpg";
                      if (!file_exists($imagen)) {$imagen = "img/productos/150x150.png";}
                    @endphp
                    <div class="col">
                        <div class="card shadow-md card-warning card-outline">
                            <img src="{{asset($imagen.'?'.time())}}" alt="imagen producto">
                            <div class="card-body">
                                <h5 class="card-title">{{$row->nombre}}</h5>
                                <p class="card-text  mb-0">{{$row->precio}} Bs </p>
                                <p class="card-text mb-2 text-right">Stock:{{$row->totalstock}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="#"class="btn btn-sm btn-outline-info">Detalles</a>
                                    </div>
                             
                                    <form action="{{route('cart.add')}}" method="POST">
                                      @csrf
                                      <input type="hidden" id="producto_id"name="producto_id" value="{{$row->id}}">
                                      {{-- <button class="btn btn-sm btn-outline-warning" type="submit" name="btn" onclick="#" >Agregar al carrito</button> --}}
                                      <button class="btn btn-sm btn-outline-warning" type="button" onclick="addproducto({{$row->id}})" name="btn" onclick="#" >Agregar al carrito</button>
                                      
                                      {{-- <button class="btn btn-sm btn-outline-warning btn-submit" type="submit" >Agregar al carrito</button> --}}
                                    </form>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
              @endforeach

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>

    </div>
  </aside>
  <!-- /.control-sidebar -->

  <script  type="text/javascript">



    //ESTA FUNICION ES PARA ELIMINAR UNA REGISTRO DE LA TABLA TEMPORAL
    function addproducto(id_producto) {
        var url='{{url('')}}/carrito-agregar/'+ id_producto;
        $.ajax({
            url: url,
            method:"GET",
            success: function(resultado){
                if (resultado == 0) {
                }
                else{
                    var resultado= JSON.parse(resultado);
                    // alert(resultado.datos);
                    $("#ContadorCart").html(resultado.datos);
                }
            }
        });
    }

/*
  $(document).ready(function() {
    $(".btn-submit").click(function(e){
      e.preventDefault();
      let link="{{asset('')}}card-add";
      var _token = $("input[name='_token']").val();
      var producto_id = $("#producto_id").val();
  
      $.ajax({
        url: link,
        type:'POST',
        data: {_token:_token, producto_id:producto_id},
        success: function(data) {
          alert('j')
          printMsg(data);
        }
      });
    }); 

    function printMsg (msg) {
      if($.isEmptyObject(msg.error)){
        console.log(msg.success);
        $('.alert-block').css('display','block').append('<strong>'+msg.success+'</strong>');
      }else{
        $.each( msg.error, function( key, value ) {
          $('.'+key+'_err').text(value);
        });
      }
    }
  });*/
  </script>
  @endsection