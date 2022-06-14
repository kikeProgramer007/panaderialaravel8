@extends('adminlte::page')
<!--//implementa la vista de adminlte -->
@section('title' )
<!--//agregamos un titulo  -->

@section('content_header')
@stop
<!--//Agregamos un header a nuestra pagina -->

@section('content')

<div class="container-fluid">
    <h1 class="text-center" >Roles Eliminados</h1>   
    <br>
        <div class="mb-4 text-center">
            <a class="btn btn-dark" href="{{asset('administracion')}}"> <i class="bi bi-coin"></i> Usuarios</a>
            <a class="btn btn-dark" href="{{asset('administracion/roles')}}"><i class="bi bi-file-earmark-bar-graph"></i> Roles</a>
        </div>
        <div class="mb-4" >
            <a class="btn btn-primary" href="{{asset('administracion/roles')}}"><i class="bi bi-brush"></i>regresar</a>
        </div>
        <div class="card">
            <div class="card-body">
                <table id="tabla_empresa"  class=" table table-bordered table-sm">
                    <thead>
                        <th> id </th>
                        <th> nombre </th>
                        <th width="10px">  </th>
                        
                    </thead>
                    <tbody>   
                    @foreach ($roles as $rol)     
                    <tr>
                        <td>{{$rol['id']}}</td>
                        <td>{{$rol['name']}}</td>
                        <td>
                            <a href="{{asset('administracion/roles/restaurar')}}/{{$rol['id']}}" class="btn btn-outline-secondary ">restaurar</a>
                        </td>       
                    </tr>
                    @endforeach
               
                    </tbody>
                </table>
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