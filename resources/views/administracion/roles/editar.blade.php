@extends('adminlte::page')
<!--//implementa la vista de adminlte -->
@section('title' )
<!--//agregamos un titulo  -->

@section('content_header')
@stop
<!--//Agregamos un header a nuestra pagina -->

@section('content')

<div class="container-fluid">
    <h1 class="text-center" >Editar Rol</h1>   
    <br>
        <div class="mb-4 text-center">
            <a class="btn btn-dark" href="{{asset('administracion')}}"> <i class="bi bi-coin"></i> Usuarios</a>
            <a class="btn btn-dark" href="{{asset('administracion/roles')}}"><i class="bi bi-file-earmark-bar-graph"></i> Roles</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{asset('administracion/roles/update')}}/{{$roles->id}}" method="POST" > 
                    @csrf
                        <div class="mb-3">
                                <label>Nombre</label>
                                <input class="form-control" type="text" id="nombre" name="nombre" value="{{$roles->name}}"   placeholder="ingrese su nombre " />
                                <span class="icon"><i class="lni lni-user"></i></span>
                                @error('nombre')
                                    <div class="alert alert-warning">
                                    {{$message}}
                                    </div>
                                @enderror
                        </div>
                        
                      <a href="{{asset('administracion/roles')}}" class="btn btn-primary" > Regresar </a>
                      <button type="submit" class="btn btn-success"> Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop

<!--//Contenido de nuestra pagina -->

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

<!--//agregamos css -->

@section('js')
    <script> console.log('Hi!'); </script>
@stop

<!--//agregamos Java Script-->