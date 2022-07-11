<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoAlmacen extends Model
{
    use HasFactory;
    
    protected $table = 'producto_almacen';
    protected $primaryKey ='id';
    protected $fillable = [
        'id_producto',
        'id_almacen',
        'stock',
        'estado'
    ];
    public $timestamps=false;

    public function porIdProductoAlmacen($id_producto,$id_almacen){
        $datos=$this->select('*')->where('id_producto','=',$id_producto)->where('id_almacen','=',$id_almacen)->get()->first(); 
        return $datos;
    }

    public function actualizaStockProductoAlmacen($id_producto, $cantidad, $operador='+')
    {
        $producto_almacen = $this->findOrFail($id_producto);
        if( $operador == '+'){
            $stock_actualizado = $producto_almacen->stock + $cantidad;
        }else{
            $stock_actualizado = $producto_almacen->stock - $cantidad;
        }
        $producto_almacen->stock = $stock_actualizado;
        $producto_almacen->update();
    }

}
