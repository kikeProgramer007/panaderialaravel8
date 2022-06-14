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
       
       Permission::create(['name'=> 'catalogo', 'subname'=> 'catalogo principal'])->syncRoles([$role1]);
       Permission::create(['name'=> 'producto', 'subname'=> 'producto'])->syncRoles([$role1,$role2]);
       Permission::create(['name'=> 'producto.producto', 'subname'=> 'catalogo'])->syncRoles([$role1,$role2]);
       Permission::create(['name'=> 'producto.categoria', 'subname'=> 'catalogo'])->syncRoles([$role1,$role2]);
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
