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
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <div class="form-group">
                                    <a class="btn btn-danger btn-sm" href="{{route('almacen.deletes')}}"><i class="far fa-trash-alt"></i>&nbsp;Eliminados</a>
                                </div>
                            </div>
                            <table id="example2" class="table table-bordered table-sm table-hover table-striped ">
                                <thead>
                                    <tr>
                                      <th width="5%"> id </th>
                                      <th>fecha</th>
                                      <th>montototal</th>
                                      <th>Estado</th>
                                      <th>Cliente</th>
                                      <th>Telefono</th>
                                      <th width="7%">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($pedidos as $pedido)
                                    <tr>
                                        <td>{{$pedido->id}}</td>
                                        <td>{{$pedido->fecha}}</td>
                                        <td>{{$pedido->montototal}}</td>
                                  
                                        @if ($pedido->estadodelpedido == 'solicitado')
                                          <td class="text-center"><span class="badge bg-warning">{{$pedido->estadodelpedido}}</span></td>
                                        @elseif($pedido->estadodelpedido == 'pendiente')
                                          <td class="text-center"><span class="badge bg-info">{{$pedido->estadodelpedido}}</span></td>
                                          @elseif ($pedido->estadodelpedido == 'entregado')
                                          <td class="text-center"><span class="badge bg-success">{{$pedido->estadodelpedido}}</span></td>
                                          @elseif ($pedido->estadodelpedido == 'cancelado')
                                          <td class="text-center"><span class="badge bg-danger">{{$pedido->estadodelpedido}}</span></td>
                                        @endif
                                        <td>{{$pedido->nombre.' '.$pedido->apellidos}}</td>
                                        <td>{{$pedido->telefono}}</td>
                                        <td class="py-1 align-middle text-center">
                                          <div class="btn-group btn-group-sm">
                                            <a target="_blank" class="btn btn-info" rel="tooltip" data-placement="top" title="Ver ubicación" href="{{$pedido->url}}"><i class="fas fa-map-marker-alt"></i></a>
                                            <a class="btn btn-warning" rel="tooltip" data-placement="top" title="Editar" href="{{route('almacen.edit', $pedido->id)}}"><i class="fas fa-pencil-alt"></i></a>
                                          </div>
                                        </td>
                                    </tr>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
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

  </script>
  @endsection