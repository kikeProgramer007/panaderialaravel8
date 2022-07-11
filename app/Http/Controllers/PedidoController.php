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
                'message' => 'error',
                'errors' =>$validator->getMessageBag()->toArray()
            ];
        }
        else{
            $error='';
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
            $ubicacion = New Ubicacion();
            $ubicacion->latitud     =  $latitud_y;
            $ubicacion->longitud    =  $longitud_x ;
            $ubicacion->referencia  =  $referencia;
            $ubicacion->url         =  $url_ubicacion;
            $ubicacion->save();

             //GUARDAR UBICACION
             $pedido = New Pedido();
             $pedido->fecha         =  $fecha;
             $pedido->fechaentrega  =  $fecha ;
             $pedido->montototal    =  number_format(\Cart::getTotal(),2);
             $pedido->estado        =  1;
             $pedido->id_ubicacion  =   $ubicacion->id;
             $pedido->id_cliente    =   $id_cliente;
            //  $pedido->id_empleado   =  NULL;
            //  $pedido->id_repartidor =  NULL;
             $pedido->save();

            //GUARDAR DERALLE PEDIDO
            $this->guardardetallepedido( $pedido->id );
         
            $res['error'] = $error;

            return redirect('/');//IR A ESA RUTA
        }
    }

    public function guardardetallepedido($id_pedido)
    { 
        foreach (\Cart::getContent() as $item) {
            
            $detalle_pedido = New DetallePedido();
            $detalle_pedido->id_productodealmacen   =  $item->id;
            $detalle_pedido->id_pedido              =  $id_pedido ;
            $detalle_pedido->cantidad               =  $item->quantity;
            $detalle_pedido->subtotal               =  number_format($item->getPriceSum(),2);
            $this->producto_almacen->actualizaStockProductoAlmacen($item->id,$item->quantity,'-');
            $detalle_pedido->save();
        }
        \Cart::clear();
    }
}
