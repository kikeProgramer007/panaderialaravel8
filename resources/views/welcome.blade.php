@extends('layouts.basehome')

@section('content')

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
            <div class="row row-cols-1 row-cols-sm-2  row-cols-md-3 row-cols-lg-4  g-3">
                @foreach ($productos as $producto)
                    @php
                       $imagen = "img/productos/".$producto->id.".jpg";
                      if (!file_exists($imagen)) {$imagen = "img/productos/150x150.png";}
                    @endphp
                    <div class="col">
                        <div class="card shadow-md  card-warning card-outline">
                            <img src="{{asset($imagen.'?'.time())}}" alt="imagen producto">
                            <div class="card-body">
                                <h5 class="card-title">{{$producto->nombre}}</h5>
                                <p class="card-text">{{$producto->precio}} Bs</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="#"class="btn btn-sm btn-outline-info">Detalles</a>
                                    </div>
                                    {{-- <button class="btn btn-sm btn-outline-warning" type="button" onclick="#">Agregar al carrito</button> --}}
                                    <form action="{{route('cart.add')}}" method="POST">
                                      @csrf
                                      <input type="hidden" name="producto_id" value="{{$producto->id}}">
                                      <button class="btn btn-sm btn-outline-warning" type="submit" name="btn" onclick="#" >Agregar al carrito</button>
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
      <p>Sidebar content</p>
      <p>Sidebar content</p>
      <p>Sidebar content</p>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  @endsection