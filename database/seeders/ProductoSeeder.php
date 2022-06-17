<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //AGREGAMOS ESTA LIBRERIA

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'id' => '1',
            'nombre' => 'Rosquete',
            'descripcion' => 'Casero',
            'precio' => 10,
            'stock' => 0,
            'estado' => 1,
            'id_categoria' => 4
        ]);
        DB::table('productos')->insert([
            'id' => '2',
            'nombre' => 'Pan de Pulque',
            'descripcion' => 'Casero',
            'precio' => 12.50,
            'stock' => 0,
            'estado' => 1,
            'id_categoria' => 1
        ]);
        DB::table('productos')->insert([
            'id' => '3',
            'nombre' => 'Pan Galleta',
            'descripcion' => 'Casero',
            'precio' => 12.00,
            'stock' => 0,
            'estado' => 1,
            'id_categoria' => 1
        ]);
        DB::table('productos')->insert([
            'id' => '4',
            'nombre' => 'Pan de Arroz',
            'descripcion' => 'Pan delicioso hecho al horno',
            'precio' => 12.4,
            'stock' => 0,
            'estado' => 1,
            'id_categoria' => 1
        ]);

    }
}
