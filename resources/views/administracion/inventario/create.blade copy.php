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
                      <h1>Agregar producto en almacén</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="">Inicio</a></li>
                          <li class="breadcrumb-item active">Inventario</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->

      <section class="content">
        <div class="container-fluid">
            <form method="POST" id="form_compra" name="form_compra" action="" autocomplete="off">
                @csrf
                <div class="card card-outline card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Agregar producto en almacén</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div><!--/.card-header-->

                    <div class="card-body">

                        <!-- /input-group -->
                        <div class="form-group mb-0">
                            <div class="row">
                                <input type="hidden" id="id_producto" name="id_producto"/>
                                <input type="hidden" id="id_compra" name="id_compra" value="62c8b8276651a"/>

                                <div class="col-12 col-sm-4">
                                    <label >Producto</label> 
                                    <div class="input-group input-group-sm mb-0 eliminarbtn">
                                        <input type="number" class="form-control" id="codigo" name="codigo" placeholder="Escribe el código y luego enter."  data-toggle="tooltip" data-placement="bottom" title="Codigo" onkeyup="buscarProducto(event,this,this.value)" value="" min="1" pattern="^[1-9]+"autofocus>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-info btn-flat" title="Lista de producto" data-toggle="modal" data-target="#lista"><i class="fas fa-list-ol"></i></button>
                                        </span>
                                    </div>
                                    <div class="row mb-0 px-2">
                                        <small for="codigo" id ="resultado_error" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 mb-2">
                                    <label>Descripción</label> 
                                    <input class="form-control form-control-sm me-md-8" id="nombre" name="nombre" type="text" disabled />
                                </div>
                                <div class="col-12 col-sm-4 mb-2">
                                  <label for="id_almacen">Almacén</label>
                                  <select class="form-control"  id="id_almacen" name="id_almacen"  required>
                                    <option selected disabled value="">Seleccionar almacén</option>
                                      @foreach ($almacenes as $almacen)
                                      <option value="{{$almacen->id}}">{{$almacen->sigla}}</option>
                                      @endforeach
                                  </select>
                                  <div class="invalid-feedback">Seleccione un almacén.</div>
                                    @error('id_almacen')
                                    <small class="text-danger"> {{$message}}</small>
                                    @enderror
                                </div>
                            </div> 
                        </div>
                        <div class="form-group mb-0">
                            <div class="row">
                                <div class="col-12 col-sm-4 mb-2">
                                    <label>Precio de venta</label> 
                                    <input class="form-control form-control-sm" id="precio_compra" name="precio_compra" type="text" disabled/>
                                </div>
                                <div class="col-12 col-sm-4">
                                  <label>Stock</label>
                                  <input class="form-control form-control-sm" id="stock" name="stock" type="number" onkeyup="Calcula_cantidad_subtotal(event,this,codigo.value,this.value)" min="1" onclick="Calcula_cantidad_subtotal2(codigo.value,cantidad.value)"  />
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="float-right">
                                        <label><br></label>
                                        <div class="mb-0">
                                        <button class="btn btn-primary btn-sm" id="agregar_producto" name="agregar_producto" type="button" onclick="agregarProducto(id_producto.value,codigo.value,cantidad.value,'62c8b8276651a')">Agregar producto</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!--/body card-->
                </div><!--/card-->

                <div class="card card-default">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tablaProductos" class="table table-sm table-bordered table-hover">
                                    <thead class="bg-dark">
                                        <th>#</th>
                                        <th>Almacén</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th width= "1%"><i class="fas fa-trash"></i></th>
                                    </thead>
                                    <tbody></tbody>
                            </table>
                        </div>


                        <div class="d-flex justify-content-center">
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-info btn-flat" type="button" id="completa_compra">Registrar en Almacen</button>
  
                                </div>
                            </div>
                        </div>

                    </div><!--/body card-->
                </div><!--/card-->

            </form>

        </div><!-- /.container-fluid -->
    </section><!-- /.content -->

  </div><!-- /.content-wrapper -->


<!-- Modal lista product-->
<div class="modal fade" id="lista">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
      <div class="modal-header p-2 px-3 lg-dark" lg-dark style="background:#3c8dbc; color:white;">
          <h4 class="modal-title w-100 text-center">Lista de productos</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <table  id="example2" class="table table-bordered table-sm table-hover table-striped ">
              <thead>
                  <tr>
                      <th>Código</th>
                      <th>Nombre</th>
                      <th>Descripción</th>      
                      <th>Precio compra</th>               
                      <th>stock</th>
                      <th width= "1%"></th>        
                  </tr>
              </thead>
              <tbody>
                                  <tr>
                      <td class="align-middle"> 1</td>                              
                      <td class="align-middle"> Pollo al Broaster</td>
                      <td class="align-middle"> Entero</td>
                      <td class="align-middle"> 20.00</td>
                      <td class="align-middle text-center">19</td>
                      <td><a class="badge bg-success" onclick="buscarproducto2(1)" rel="tooltip" data-placement="top" title="Seleccionar"> <i class="fas fa-plus"></i></a></td> 
                  </tr>        
                                  <tr>
                      <td class="align-middle"> 2</td>                              
                      <td class="align-middle"> Mil. de Carne</td>
                      <td class="align-middle"> Eco.</td>
                      <td class="align-middle"> 7.00</td>
                      <td class="align-middle text-center">8</td>
                      <td><a class="badge bg-success" onclick="buscarproducto2(2)" rel="tooltip" data-placement="top" title="Seleccionar"> <i class="fas fa-plus"></i></a></td> 
                  </tr>        
                                  <tr>
                      <td class="align-middle"> 3</td>                              
                      <td class="align-middle"> Pollo al Broaster</td>
                      <td class="align-middle"> Medio</td>
                      <td class="align-middle"> 18.00</td>
                      <td class="align-middle text-center">18</td>
                      <td><a class="badge bg-success" onclick="buscarproducto2(3)" rel="tooltip" data-placement="top" title="Seleccionar"> <i class="fas fa-plus"></i></a></td> 
                  </tr>        
                                  <tr>
                      <td class="align-middle"> 4</td>                              
                      <td class="align-middle"> Pespi</td>
                      <td class="align-middle"> 2L</td>
                      <td class="align-middle"> 10.00</td>
                      <td class="align-middle text-center">59</td>
                      <td><a class="badge bg-success" onclick="buscarproducto2(4)" rel="tooltip" data-placement="top" title="Seleccionar"> <i class="fas fa-plus"></i></a></td> 
                  </tr>        
                                  <tr>
                      <td class="align-middle"> 5</td>                              
                      <td class="align-middle"> CocaCola</td>
                      <td class="align-middle"> 500ml</td>
                      <td class="align-middle"> 5.00</td>
                      <td class="align-middle text-center">78</td>
                      <td><a class="badge bg-success" onclick="buscarproducto2(5)" rel="tooltip" data-placement="top" title="Seleccionar"> <i class="fas fa-plus"></i></a></td> 
                  </tr>        
                    
              </tbody>
          </table>
      </div>
      <div class="modal-footer p-1 justify-content-end">
          <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Cerrar lista</button>
      </div>
      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
