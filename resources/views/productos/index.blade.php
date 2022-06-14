@extends('layouts.base')

@section('content')

<div class="container py-4">
    <h2 class="text-center">CRUD con laravel 8, php, bootstrap 5 y datatables</h2>
    
    <div class="mb-3">
        <a href="{{route('product.create')}}" class="btn btn-primary"><i class="bi bi-person-plus"></i> Agregar producto</a>
    </div>
  
    @if (Session::has('mensaje'))
        <div class="alert alert-info my-3 text-center">
            {{Session::get('mensaje')}}
        </div>
    @endif

    <div class="card">
        <div class="card-header text-center"><b>Registro de Productos</b></div>
        <div class="table-responsive">
        <div class="card-body"> 
          
        <table id="example" class="table table-sm table-striped table-hover table-bordered nowrap" style="width:100%">
            <thead>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th width="1%"></th>
                <th width="1%"></th>
            </thead>
            <tbody>
             
                    <tr>
                        <td>------------------</td>
                        <td>------------------</td>
                        <td>------------------</td>
                        <td>------------------</td>
                        <td><a href="" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a></td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick=""><i class="bi bi-trash2-fill"></i></button>
                        </td>
                        
                    </tr>
                    @empty
                    <tr>
                    <td colspan="6" class="text-center">No hay registro</td>
                </tr>
   
            </tbody>
        </table>

    </div><!--card-body-->
    </div><!--table-responsive-->
    </div><!--card-->
</div>

<script type="text/javascript">
function eliminar($id) {
    var url='{{asset('')}}product/eliminar/'+$id;
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '!Si, elimínalo!',
  
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            '¡Eliminado!',
            'Su archivo ha sido eliminado.',
            'success'
            ),
            window.location.href = url;
        }
    });
}
</script>

@endsection