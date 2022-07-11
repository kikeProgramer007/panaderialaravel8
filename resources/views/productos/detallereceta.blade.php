@extends('layouts.base')

@section('content')

    {{-- INICIO DEL CUERPO --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-0">
                  <div class="col-sm-6 mb-0">
                      <h1>Detalle Receta</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="">Inicio</a></li>
                          <li class="breadcrumb-item active">Producto</li>
                          <li class="breadcrumb-item active">Detalle Receta</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="mb-3">
                            <a class="btn btn-danger" href="{{asset('producto/receta/eliminar')}}/{{$id_producto}}">eliminar receta</a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                               <table id="example2" class="table table-bordered table-sm table-hover table-striped ">
                                  <thead>
                                      <tr>
                                        <th width="5%"> id_ingrediente </th>
                                        <th> nombre </th>
                                        <th> cantidad </th>
                                        <th> unidad </th>
                                        {{--<th width="7%">Acción</th>--}}
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($detalle as $det)
                                      <tr>
                                          <td>{{$det->id_ingrediente}}</td>
                                          @foreach ($ingredientes as $ingrediente)
                                              @if ($ingrediente->id==$det->id_ingrediente)
                                                <td>{{$ingrediente->nombre}}</td>
                                                <td>{{$det->cantidad}}</td>
                                                <td>{{$det->unidad}}</td>
                                                {{--<td class="py-1 align-middle text-center">
                                                  <div class="btn-group btn-group-sm">
                                                    <a class="btn btn-warning" rel="tooltip" data-placement="top" title="Editar" href=""><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="#" class="btn btn-danger" rel="tooltip" data-placement="top" title="Eliminar" data-href="" data-toggle="modal" data-target="#modal-confirma"><i class="fas fa-trash"></i></a>
                                                  </div>
                                                </td> --}} 
                                              @endif
                                          @endforeach
                                          
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
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal -->
  <div class="modal fade" id="modal-confirma" data-backdrop="static">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Eliminar Registro</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>¿Desea Eliminar este registro?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-danger btn-ok btn-sm">Confirmar</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
    <!-- /.modal -->

@endsection
