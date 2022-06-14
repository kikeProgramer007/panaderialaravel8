@extends('adminlte::page')
<!--//implementa la vista de adminlte -->
@section('title' )
<!--//agregamos un titulo  -->

@section('content_header')
@stop
<!--//Agregamos un header a nuestra pagina -->

@section('content')

<div class="container-fluid">
    <h1 class="text-center" >Roles</h1>   
    <br>
        <div class="mb-4 text-center">
            <a class="btn btn-dark" href="{{asset('administracion')}}"> <i class="bi bi-coin"></i> Usuarios</a>
            <a class="btn btn-dark" href="{{asset('administracion/roles')}}"><i class="bi bi-file-earmark-bar-graph"></i> Roles</a>
        </div>
        <div class="mb-4" >
           
        </div>
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
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
                            <div class="mb-1">
                                <input class="form-check-input" type="checkbox" @if ($sw==1){{'checked'}} @endif value ="{{$permiso['id']}}" name= "permisos[]" >
                                <label for="">{{$permiso['name']}}</label>   
                            </div>  
                        @endforeach

                        <br>

                        <button class="btn btn-success" type="submit">Guardar</button>
                    </form>
                </div>
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