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
            <h1>Asignar permisos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{asset('administracion/roles')}}">Roles</a></li>
              <li class="breadcrumb-item active">Asignar permisos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
   
                <div class="card card card-outline card-primary">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{asset('administracion/permisos/update')}}/{{$id_aux}}" method="POST">
                                    @csrf
                                    @foreach ($permisos as $permiso)
                                        @php($per=$permiso['id'])
                                        @php($sw=0)
                                        @foreach ($rol_permiso as $rol_per)
                                            @if ($per==$rol_per['permission_id'])
                                            @php($sw=1)
                                            @endif
                                        @endforeach
                                            <div class="custom-control custom-switch">
                                                <input class="custom-control-input" type="checkbox" id="{{$permiso['id']}}" @if ($sw==1){{'checked'}} @endif value ="{{$permiso['id']}}" name= "permisos[]"/>
                                                <label class="custom-control-label font-weight-normal" for="{{$permiso['id']}}">{{$permiso['name']}}</label>
                                            </div>
                                    @endforeach
                                    <div class="d-flex justify-content-end">
                                        <div>
                                          <button type="submit" class= "btn btn-success btn-sm">Guardar</button> 
                                          <a href="{{asset('administracion/roles')}}" class= "btn btn-secondary btn-sm">Regresar</a>  
                                        </div>
                                    </div>
                                </form>
                            </div>
        
                        </div>
          

                    </div><!--/body card-->

                </div><!--/CARD FIN-->

        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection