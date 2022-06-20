<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str; //Extencion para importar imagen
use Illuminate\Support\Facades\File;//extencion para eliminar imagen
// use Illuminate\Support\Facades\StorageNews
// Storage::disk('public')->delete("images/news/{$news->file_name}");
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
            'img_producto' => 'image|mimes:jpg,jpeg|max:2048|min:8'
        ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->id_categoria = $request->id_categoria;
        $producto->save();
        
        //script para subir una imagen
        if ($request->hasFile("img_producto")) {//existe un campo de tipo file?
            $imagen = $request->file("img_producto"); //almacenar imagen en variable
            $nombreimagen = Str::slug($producto->id).".".$imagen->guessExtension();//insertar parametro del nombre de imagen
            $ruta = public_path("img/productos/");//guardar en esa ruta
            $imagen->move($ruta,$nombreimagen); //mover la imagen es esa ruta y con ese nombre

            //copy($imagen->getRealPath(),$ruta.$nombreimagen); copiar imagen un una ruta
        }

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
            'img_producto' => 'image|mimes:jpg,jpeg|max:2048|min:8'
        ]);

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->id_categoria = $request->id_categoria;
        $producto->update();

        //script para subir editar una imagen
        if ($request->hasFile("img_producto")) {
            $image_path = public_path("img/productos/{$request->id}.jpg");
            if (File::exists($image_path)) {
                File::delete($image_path);  //eliminar imagen existente
            }
            $imagen = $request->file("img_producto");
            $nombreimagen =  $request->id.".jpg";
            $ruta = public_path("img/productos/");
            $imagen->move($ruta,$nombreimagen);
        }
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
