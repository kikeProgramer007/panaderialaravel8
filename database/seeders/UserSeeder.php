<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;  // para la contrsenia
use Spatie\Permission\Models\Role;    // crear roles
use Spatie\Permission\Models\Permission; // crear permisos



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //creacion de roles y permisos 
       $role1=Role::create(['name'=>'Administrador']);
       $role2=Role::create(['name'=>'INVITADO']);
       
       Permission::create(['name'=> 'catalogo', 'subname'=> 'catalogo principal'])->syncRoles([$role1,$role2]);
       //administracion usuarios
       Permission::create(['name'=> 'usuario', 'subname'=> 'usuario principal','tipo'=>2])->syncRoles([$role1]);
       Permission::create(['name'=> 'usuario.editar', 'subname'=> 'editar usuarios','tipo'=>2])->syncRoles([$role1]);
       Permission::create(['name'=> 'usuario.eliminar', 'subname'=> 'eliminar usuarios','tipo'=>2])->syncRoles([$role1]);
       Permission::create(['name'=> 'usuario.agregar', 'subname'=> 'agregar usuarios','tipo'=>2])->syncRoles([$role1]);
       Permission::create(['name'=> 'usuario.eliminados', 'subname'=> 'ver usuarios eliminados','tipo'=>2])->syncRoles([$role1]);
       Permission::create(['name'=> 'usuario.restore', 'subname'=> 'restaurar usuarios eliminados','tipo'=>2])->syncRoles([$role1]);
       //administracion roles
       Permission::create(['name'=> 'rol', 'subname'=> 'rol principal','tipo'=>3])->syncRoles([$role1]);
       Permission::create(['name'=> 'rol.editar', 'subname'=> 'editar rol','tipo'=>3])->syncRoles([$role1]);
       Permission::create(['name'=> 'rol.eliminar', 'subname'=> 'eliminar rol','tipo'=>3])->syncRoles([$role1]);
       Permission::create(['name'=> 'rol.agregar', 'subname'=> 'agregar rol','tipo'=>3])->syncRoles([$role1]);
       Permission::create(['name'=> 'rol.eliminados', 'subname'=> 'ver rol eliminados','tipo'=>3])->syncRoles([$role1]);
       Permission::create(['name'=> 'rol.restore', 'subname'=> 'restaurar rol eliminados','tipo'=>3])->syncRoles([$role1]);
       Permission::create(['name'=> 'rol.permiso', 'subname'=> 'ver permisos del rol','tipo'=>3])->syncRoles([$role1]);
        //administracion provedor
        Permission::create(['name'=> 'provedor', 'subname'=> 'provedor principal','tipo'=>4])->syncRoles([$role1]);
        Permission::create(['name'=> 'provedor.editar', 'subname'=> 'editar provedor','tipo'=>4])->syncRoles([$role1]);
        Permission::create(['name'=> 'provedor.eliminar', 'subname'=> 'eliminar provedor','tipo'=>4])->syncRoles([$role1]);
        Permission::create(['name'=> 'provedor.agregar', 'subname'=> 'agregar provedor','tipo'=>4])->syncRoles([$role1]);
        Permission::create(['name'=> 'provedor.eliminados', 'subname'=> 'ver provedor eliminados','tipo'=>4])->syncRoles([$role1]);
        Permission::create(['name'=> 'provedor.restore', 'subname'=> 'restaurar provedor eliminados','tipo'=>4])->syncRoles([$role1]);
        //administracion cliente
        Permission::create(['name'=> 'cliente', 'subname'=> 'cliente principal','tipo'=>5])->syncRoles([$role1]);
        Permission::create(['name'=> 'cliente.editar', 'subname'=> 'editar cliente','tipo'=>5])->syncRoles([$role1]);
        Permission::create(['name'=> 'cliente.eliminar', 'subname'=> 'eliminar cliente','tipo'=>5])->syncRoles([$role1]);
        Permission::create(['name'=> 'cliente.agregar', 'subname'=> 'agregar cliente','tipo'=>5])->syncRoles([$role1]);
        Permission::create(['name'=> 'cliente.eliminados', 'subname'=> 'ver cliente eliminados','tipo'=>5])->syncRoles([$role1]);
        Permission::create(['name'=> 'cliente.restore', 'subname'=> 'restaurar cliente eliminados','tipo'=>5])->syncRoles([$role1]);
           //administracion categoria
        Permission::create(['name'=> 'categoria', 'subname'=> 'categoria principal','tipo'=>6])->syncRoles([$role1]);
        Permission::create(['name'=> 'categoria.editar', 'subname'=> 'editar categoria','tipo'=>6])->syncRoles([$role1]);
        Permission::create(['name'=> 'categoria.eliminar', 'subname'=> 'eliminar categoria','tipo'=>6])->syncRoles([$role1]);
        Permission::create(['name'=> 'categoria.agregar', 'subname'=> 'agregar categoria','tipo'=>6])->syncRoles([$role1]);
        Permission::create(['name'=> 'categoria.eliminados', 'subname'=> 'ver categoria eliminados','tipo'=>6])->syncRoles([$role1]);
        Permission::create(['name'=> 'categoria.restore', 'subname'=> 'restaurar categoria eliminados','tipo'=>6])->syncRoles([$role1]);
        //administracion ingrediente
        Permission::create(['name'=> 'ingrediente', 'subname'=> 'ingrediente principal','tipo'=>7])->syncRoles([$role1]);
        Permission::create(['name'=> 'ingrediente.editar', 'subname'=> 'editar ingrediente','tipo'=>7])->syncRoles([$role1]);
        Permission::create(['name'=> 'ingrediente.eliminar', 'subname'=> 'eliminar ingrediente','tipo'=>7])->syncRoles([$role1]);
        Permission::create(['name'=> 'ingrediente.agregar', 'subname'=> 'agregar ingrediente','tipo'=>7])->syncRoles([$role1]);
        Permission::create(['name'=> 'ingrediente.eliminados', 'subname'=> 'ver ingrediente eliminados','tipo'=>7])->syncRoles([$role1]);
        Permission::create(['name'=> 'ingrediente.restore', 'subname'=> 'restaurar ingrediente eliminados','tipo'=>7])->syncRoles([$role1]);
        //administracion empleado
        Permission::create(['name'=> 'empleado', 'subname'=> 'empleado principal','tipo'=>8])->syncRoles([$role1]);
        Permission::create(['name'=> 'empleado.editar', 'subname'=> 'editar empleado','tipo'=>8])->syncRoles([$role1]);
        Permission::create(['name'=> 'empleado.eliminar', 'subname'=> 'eliminar empleado','tipo'=>8])->syncRoles([$role1]);
        Permission::create(['name'=> 'empleado.agregar', 'subname'=> 'agregar empleado','tipo'=>8])->syncRoles([$role1]);
        Permission::create(['name'=> 'empleado.eliminados', 'subname'=> 'ver empleado eliminados','tipo'=>8])->syncRoles([$role1]);
        Permission::create(['name'=> 'empleado.restore', 'subname'=> 'restaurar empleado eliminados','tipo'=>8])->syncRoles([$role1]);
        //administracion repartidor
        Permission::create(['name'=> 'repartidor', 'subname'=> 'repartidor principal','tipo'=>9])->syncRoles([$role1]);
        Permission::create(['name'=> 'repartidor.editar', 'subname'=> 'editar repartidor','tipo'=>9])->syncRoles([$role1]);
        Permission::create(['name'=> 'repartidor.eliminar', 'subname'=> 'eliminar repartidor','tipo'=>9])->syncRoles([$role1]);
        Permission::create(['name'=> 'repartidor.agregar', 'subname'=> 'agregar repartidor','tipo'=>9])->syncRoles([$role1]);
        Permission::create(['name'=> 'repartidor.eliminados', 'subname'=> 'ver repartidor eliminados','tipo'=>9])->syncRoles([$role1]);
        Permission::create(['name'=> 'repartidor.restore', 'subname'=> 'restaurar repartidor eliminados','tipo'=>9])->syncRoles([$role1]);
        //administracion reportes
        Permission::create(['name'=> 'reporte', 'subname'=> 'reporte principal','tipo'=>10])->syncRoles([$role1]);
        Permission::create(['name'=> 'reporte.stock_minimo', 'subname'=> 'mostrar reporte de stock minimos','tipo'=>10])->syncRoles([$role1]);
        Permission::create(['name'=> 'reporte.rango_de_fechas', 'subname'=> 'mostrar reportes con rango de fechas','tipo'=>10])->syncRoles([$role1]);
        // graficos
        Permission::create(['name'=> 'grafico', 'subname'=> 'mostrar graficos de promedios','tipo'=>11])->syncRoles([$role1]);
        //administracion pedido
        Permission::create(['name'=> 'pedido', 'subname'=> 'pedido principal','tipo'=>12])->syncRoles([$role1]);
        Permission::create(['name'=> 'pedido.editar', 'subname'=> 'mostrar editar pedidos','tipo'=>12])->syncRoles([$role1]);
        Permission::create(['name'=> 'pedido.solicitudes', 'subname'=> 'permitir aceptar solicitudes','tipo'=>12])->syncRoles([$role1]);
        Permission::create(['name'=> 'pedido.asignar', 'subname'=> 'asignar repartidor a pedidos','tipo'=>12])->syncRoles([$role1]);
        //produccion
        Permission::create(['name'=> 'produccion', 'subname'=> 'produccion principal','tipo'=>13])->syncRoles([$role1]);
        Permission::create(['name'=> 'produccion.nuevo', 'subname'=> 'crear produccion','tipo'=>13])->syncRoles([$role1]);
        Permission::create(['name'=> 'produccion.terminados', 'subname'=> 'ver estado de produccion','tipo'=>13])->syncRoles([$role1]);
        //administracion productor
        Permission::create(['name'=> 'producto', 'subname'=> 'producto principal','tipo'=>14])->syncRoles([$role1]);
        Permission::create(['name'=> 'producto.editar', 'subname'=> 'editar producto','tipo'=>14])->syncRoles([$role1]);
        Permission::create(['name'=> 'producto.eliminar', 'subname'=> 'eliminar producto','tipo'=>14])->syncRoles([$role1]);
        Permission::create(['name'=> 'producto.agregar', 'subname'=> 'agregar producto','tipo'=>14])->syncRoles([$role1]);
        Permission::create(['name'=> 'producto.eliminados', 'subname'=> 'ver producto eliminados','tipo'=>14])->syncRoles([$role1]);
        Permission::create(['name'=> 'producto.restore', 'subname'=> 'restaurar producto eliminados','tipo'=>14])->syncRoles([$role1]);

       user::create([
           'name' => 'admin',
           'email' => 'admin@gmail.com',
           'password' => Hash::make('12345678'),
       ])->assignRole('Administrador');

       user::create([
        'name' => 'enrique',
        'email' => 'enrique@gmail.com',
        'password' => Hash::make('12345678'),
        ])->assignRole('INVITADO'); 
    }
}
