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
            <h1 class="m-0 text-dark"> Pedidos realizados</h1>
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
            <div class="row row-cols-1 row-cols-md-2  row-cols-lg-3 g-2">
                @php $c=1; @endphp
                @foreach ($pedidos as $row)   
                    <div class="col">
                        <div class="card shadow-md card-dark card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                      <h4 class="text-dark">
                                        {{$c++;}}. <i class="fas fa-hard-hat"></i>
                                      </h4>
                                    </div>
                                    <div class="col-6">
                                        <h5>
                                          <small class="float-right">Fecha: {{$row->fecha}}</small>
                                        </h5>
                                      </div>
                                </div>
                                <div class="invoice-col">
                                    <b>Orden ID:</b> {{$row->id}}<br>
                                    <b>Nombre :</b> {{$row->nombre}}<br>
                                    <b>Apellidos :</b> {{$row->apellidos}}<br>
                                    <b>Correo electrónico:</b> {{auth()->user()->email;}}<br>
                                    <b>Telefono:</b>  {{$row->telefono}}<br>
                                    <b>Dirección:</b>  {{$row->referencia}}<br>
                                    <b>sus pedidos:</b> 968-34567<br>
                                    <b>Monto total:</b> {{$row->montototal}} Bs<br>
                                    <b>Estado del pedido:</b>
                                  @if ($row->id_empleado == NULL && $row->id_repartidor == NULL)
                                    <span class="text-warning">solicitado</span>
                                    @elseif ($row->estadodelpedido == 'pendiente')
                                    <span class="text-info">{{$row->estadodelpedido}}</span>
                                    @elseif ($row->estadodelpedido == 'entregado')
                                    <span class="text-success">{{$row->estadodelpedido}}</span>
                                    @elseif ($row->estadodelpedido == 'cancelado')
                                    <span class="text-danger">{{$row->estadodelpedido}}</span>
                                  @endif
                                    <br>
                                  </div>
                                  <br>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                      @if ($row->id_empleado == NULL && $row->id_repartidor == NULL)
                                        <a href="#"class="btn btn-sm btn-danger">Cancelar Pedido</a>
                                      @endif
                                    </div>
                                    <form action="{{route('cart.add')}}" method="POST">
                                      @csrf
                                      <input type="hidden" id="producto_id"name="producto_id" value="{{$row->id}}">
                                      <button class="btn btn-sm btn-dark" type="button" onclick="addproducto({{$row->id}})" name="btn" onclick="#" >Ver detalle</button>
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

  </script>
  @endsection