<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //AGREGAMOS ESTA LIBRERIA

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'id' => '1',
            'nombre' => 'Casero',
        ]);
        DB::table('categorias')->insert([
            'id' => '2',
            'nombre' => 'Integrales',
        ]);
        DB::table('categorias')->insert([
            'id' => '3',
            'nombre' => 'Molletes',
        ]);
        DB::table('categorias')->insert([
            'id' => '4',
            'nombre' => 'Roscas',
        ]);
        DB::table('categorias')->insert([
            'id' => '5',
            'nombre' => 'Dulces',
        ]);
    }
}
