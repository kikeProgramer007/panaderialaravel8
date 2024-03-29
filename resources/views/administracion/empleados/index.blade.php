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
                      <h1>Empleado</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="">Inicio</a></li>
                          <li class="breadcrumb-item active">Empleado</li>
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

                          <!-- /.card-header -->
                          <div class="card-body">
                              <div class="d-flex justify-content-end">
                                  <div class="form-group">
                                      <a class="btn btn-info btn-sm" href="{{ asset('administracion/empleado/create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Agregar</a>
                                      <a class="btn btn-danger btn-sm" href="{{ asset('administracion/empleado/eliminados') }}"><i class="far fa-trash-alt"></i>&nbsp;Eliminados</a>
                                  </div>
                              </div>
                              <table id="example2" class="table table-bordered table-sm table-hover table-striped ">
                                  <thead>
                                      <tr>
                                          <th> id </th>
                                          <th> nombre </th>
                                          <th> apellidos </th>
                                          <th> edad </th>
                                          <th> telefono </th>
                                          <th> direccion </th>
                                          <th> sueldo </th>
                                          <th> login </th>
                                          <th width="7px">Acción</th>
                                              
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($empleados as $empleado)
                                          <tr>
                                              <td>{{ $empleado->id }}</td>
                                              <td>{{ $empleado->nombre }}</td>
                                              <td>{{ $empleado->apellidos }}</td>
                                              <td>{{ $empleado->edad }}</td>
                                              <td>{{ $empleado->telefono }}</td>
                                              <td>{{ $empleado->direccion }}</td>
                                              <td>{{ $empleado->sueldo }}</td>
                                              @php($id_user=$empleado->id_usuario)
                                              @foreach ($usuarios as $usuario)
                                                @if ($id_user == $usuario->id)
                                                <td>{{ $usuario->email }}</td>  
                                                @endif
                                              @endforeach

                
                                              <td class="py-1 align-middle text-center">
                                                <div class="btn-group btn-group-sm">
                                                  <a class="btn btn-warning" rel="tooltip" data-placement="top" title="Editar" href="{{ asset('administracion/empleado/edit') }}/{{ $empleado->id }}"><i class="fas fa-pencil-alt"></i></a>
                                                  <a href="#" class="btn btn-danger" rel="tooltip" data-placement="top" title="Eliminar" data-href="{{ asset('administracion/empleado/destroy') }}/{{ $empleado->id }}" data-toggle="modal" data-target="#modal-confirma"><i class="fas fa-trash"></i></a>
                                                </div>
                                              </td>  
                                            
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