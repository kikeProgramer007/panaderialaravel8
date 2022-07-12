<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\ProductoAlmacen;
use App\Models\Ubicacion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Cart;

class PedidoController extends Controller
{
    protected $producto_almacen;

    public function __construct()
    {
        $this->producto_almacen = New ProductoAlmacen();
    }

    public function store( Request $request){
        $rules=array(
            'id_usuario'  =>"required|numeric",
            'id_cliente' =>"required|numeric",
            'correo'  =>"required|email",
            'apellidos' =>"required",
            'telefono' =>"required",
            'fecha' =>"required",
            'url_ubicacion' =>"required",
            'latitud_y' =>"required",
            'longitud_x' =>"required",
            'referencia' =>"required",
        );

        $validator=Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return [
                'error' => true,
                'errors' =>$validator->getMessageBag()->toArray()
            ];
        }
        else{
            //RECIBIENDO PARAMETROS DEL FORMULARIO
            $id_usuario     = $request->id_usuario;
            $id_cliente     = $request->id_cliente;
            $correo         = $request->correo;
            $apellidos      = $request->apellidos;
            $telefono       = $request->telefono;
            $fecha          = $request->fecha;
            $url_ubicacion  = $request->url_ubicacion;
            $latitud_y      = $request->latitud_y;
            $longitud_x     = $request->longitud_x;
            $referencia     = $request->referencia;

            //GUARDAR UBICACION
            $ubicacion = new Ubicacion();
            $ubicacion->latitud     =  $latitud_y;
            $ubicacion->longitud    =  $longitud_x ;
            $ubicacion->referencia  =  $referencia;
            $ubicacion->url         =  $url_ubicacion;

            //GUARDAR UBICACION
             $id_ubicacion = $ubicacion->id;
             $pedido = new Pedido();
             $pedido->fecha             =  $fecha;
             $pedido->fechaentrega      =  $fecha;
             $pedido->montototal        =   Cart::getTotal();
             $pedido->estadodelpedido   =   'pendiente';
             $pedido->estado            =   1;
             $pedido->id_ubicacion      =   $id_ubicacion;
             $pedido->id_cliente        =   $id_cliente;
             $pedido->id_empleado       =   NULL;
             $pedido->id_repartidor     =   NULL;
    
            $id_pedido = $pedido->id;
            //GUARDAR DERALLE PEDIDO
            $error =$this->guardardetallepedido( $id_pedido );
            if ($error) {
            
            }else{
                //CONFIRMAR GUARDADO
                $ubicacion->save();
                $pedido->save();
            }
            //$res['dato'] =  $this->FunctionName('3','2',4);
            
             $res['error'] = $error;
            return json_encode($res);
        }
    }

    public function guardardetallepedido($id_pedido)
    { 
        try {
            foreach (\Cart::getContent() as $item) {
                $productalmacen = $this->producto_almacen->buscar_mi_almacen($item->id,$item->quantity);
                $detalle_pedido = new DetallePedido();
                $detalle_pedido->id_productodealmacen   = $productalmacen['id'];
                $detalle_pedido->id_pedido              =  $id_pedido ;
                $detalle_pedido->cantidad               =  $item->quantity;
                $detalle_pedido->subtotal               =  $item->getPriceSum();
                $detalle_pedido->save();
                $this->producto_almacen->actualizaStockProductoAlmacen($productalmacen['id'], $item->id ,$item->quantity,'-');
            }
            $error = false;
            Cart::clear();
        } catch (\Throwable $th) {
            $error = true;
        }
        return  $error;
    }

    public  function FunctionName($id_productodealmacen, $id_producto, $cantidad)
    {
        $producto_almacen =ProductoAlmacen::findOrFail($id_productodealmacen);
       
        if($producto_almacen->stock >= $cantidad){
            $stock_actualizado = $producto_almacen->stock - $cantidad;
            $producto_almacen->stock = $stock_actualizado;
            $producto_almacen->update();
        }else{
         
        //    $id_prod_alm = $this->producto_almacen->id_prod_alm($id_producto);
        //    foreach ($id_prod_alm as $row) {
        //           if ($row['id']) {
        //           $productoAlmacen = ProductoAlmacen::findOrFail($row['id']);
        //            $productoAlmacen->stock = '0';
        //           $productoAlmacen->update();
        //        }
        //    }
             return "se modifico varios el stocks de registros";
        }
   
    }

}
