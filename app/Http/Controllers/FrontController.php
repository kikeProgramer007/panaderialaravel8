<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $sql = "SELECT SUM(producto_almacen.stock) AS totalstock, productos.id, productos.nombre, productos.descripcion, productos.precio
        FROM producto_almacen INNER JOIN productos
        ON producto_almacen.id_producto = productos.id
        WHERE producto_almacen.estado = 1
        AND producto_almacen.stock > 0
        GROUP BY productos.id, productos.nombre, productos.descripcion, productos.precio;";

        $productos = DB::select($sql);

        return view('welcome',compact('productos'));
    }
}
