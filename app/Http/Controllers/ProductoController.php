<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all()->where('estado',1);
        return view('productos.index',compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all()->where('estado',1);
        return view('productos.create',compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:40',
            'descripcion'=>'required',
            'precio'=>'required',
            'id_categoria'=>'required',
            'img_producto'=>'required',
        ]);
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->id_categoria = $request->id_categoria;
        $producto->save();
        return redirect('producto');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all()->where('estado',1);

        return view('productos.editar',compact('producto','categorias'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'=>'required|max:40',
            'descripcion'=>'required',
            'precio'=>'required',
            'id_categoria'=>'required',
            'img_producto'=>'required',
        ]);
        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->id_categoria = $request->id_categoria;
        $producto->update();
        return redirect('producto');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->estado = 0;
        $producto->update();
        $productos = Producto::all()->where('estado',1);
        return view('productos.index',compact('productos'));
    }

    public function deletes()
    {
        $productos = Producto::all()->where('estado',0);
        return view('productos.eliminados',compact('productos'));
    }

    public function restore($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->estado = 1;
        $producto->update();
        return redirect('/producto');//IR A ESA RUTA
    }
}
