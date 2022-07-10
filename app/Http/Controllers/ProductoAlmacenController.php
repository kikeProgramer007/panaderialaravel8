<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\Producto;
use App\Models\ProductoAlmacen;
use Illuminate\Http\Request;

class ProductoAlmacenController extends Controller
{
    //

    //PRODUCTO EN ALMACEN(INVENTARIO) - TABLA INTERMEDIA
    
    public function index()
    {

        $producto_almacen=ProductoAlmacen::select(
            'producto_almacen.id as id_product_almacen',
            'productos.nombre',
            'productos.precio',
            'producto_almacen.stock',
            'almacenes.sigla'
        )
        ->join('productos','producto_almacen.id_producto','=','productos.id')
        ->join('almacenes','producto_almacen.id_almacen','=','almacenes.id')
        ->where('producto_almacen.estado','=',1)
        ->orderBy('producto_almacen.stock','asc')
        ->get();
        //->get(); //DEVUELDE TODOS LOS DATOS
        //->toSql();  //DEVUELVE LA CONSULTA REALIZADA PERO EN COMANDOS
     /* if (count($producto_almacen) > 0) {//SI NO ESTA VACIO
             return $producto_almacen;
         }else{
             return [
                 'success' => false,
                 'message' => 'No hay regitros',
            ];
         }*/

        return view('administracion.inventario.index',compact('producto_almacen'));

    }

    public function create()
    {
        $almacenes = Almacen::all()->where('estado',1);
        $productos = Producto::all()->where('estado',1);
        return view('administracion.inventario.create',compact('almacenes','productos'));
    }

    public function all(Request $request){


        $data = Almacen::findOrFail(1);
        // return response()->json($data, 200, []);
        $res['datos']='hola como te llamas';
        $res['nombre']=$request->nombre;
        //  return response()->json($data);
         return json_encode($res);
        // return "hola";
    }


    public function buscarporcodigo($id){
        $datos = Producto::findOrFail($id);

        $res['messege']='hola como te llamas';
        $res['id']=$id;
        $res['datos']=$datos;
        //  return response()->json($data);
         return json_encode($res);
        // return "hola";
    }
    
}
