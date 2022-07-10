<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Repartidor;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RepartidorController extends Controller
{
    

    public function index()
    {
     $repartidores = Repartidor::all()->where('estado',1);
     $usuarios=User::all()->where('estado',1);
     return view('administracion/repartidores/index',compact('repartidores','usuarios'));
    }

    public function create()
    {
      return view('administracion/repartidores/create');
    }

    public function store(Request $request)
    {
        //return $request;
        $request->validate([
            'nombre'=> 'required',
            'email'=> 'required',
            'contraseña'=> 'required',
            'confirmar_contraseña'=> 'required',
            'apellidos'=> 'required',
            'edad'=> 'required',
            'nro_licencia'=> 'required',
            'telefono'=> 'required',
        ]);

        $usuario= new User();
        $usuario->name=$request->nombre;
        $usuario->email=$request->email;
        $usuario->password=Hash::make($request->contraseña);
        $usuario->save();
        $usuario->assignRole('Repartidor'); // rol por defecto que se asignara a un repartidor

        $repartidor= new Repartidor();
        $repartidor->nombre=$request->nombre;
        $repartidor->apellidos=$request->apellidos;
        $repartidor->edad=$request->edad;
        $repartidor->telefono=$request->telefono;
        $repartidor->nro_licencia=$request->nro_licencia;
        $repartidor->id_usuario=$usuario->id;
        $repartidor->save();
        return  redirect()->to(route('repartidor'));
    }

    public function show(Repartidor $repartidor)
    {
        //
    }

    public function restore(Repartidor $repartidor)
    {
        $usuario=User::all();
        $usuario=$usuario->where('id',$repartidor->id_usuario)->first();
        $usuario->estado=1;
        $repartidor->estado=1;
        $repartidor->update();
        $usuario->update();
        return  redirect()->to(route('repartidor'));
    }

    public function deletes()
    {
        $repartidores = Repartidor::all()->where('estado',0);
        $usuarios=User::all()->where('estado',0);
        return view('administracion/repartidores/eliminados',compact('repartidores','usuarios'));
    }

    public function edit(Repartidor $repartidor)
    {
        $usuario= User::all(); 
        return view('administracion/repartidores/editar',compact('repartidor','usuario'));
    }


    public function update(Request $request, Repartidor $repartidor)
    {
        $repartidor->nombre=$request->nombre;
        $repartidor->edad=$request->edad;
        $repartidor->telefono=$request->telefono;
        $repartidor->apellidos=$request->apellidos;
        $repartidor->nro_licencia=$request->nro_licencia;
        
      //  return 'se actualizo';
        $usuario=User::all();
        $usuario=$usuario->where('id',$repartidor->id_usuario)->first();
        $usuario->name=$request->nombre;
        $repartidor->update();
        $usuario->update();
        return  redirect()->to(route('repartidor'));
    }

    public function destroy(Repartidor $repartidor)
    {
        $usuario=User::all();
        $usuario=$usuario->where('id',$repartidor->id_usuario)->first();
        $usuario->estado=0;
        $repartidor->estado=0;
        $repartidor->update();
        $usuario->update();
        return  redirect()->to(route('repartidor'));

    }
}
