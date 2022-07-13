<?php

namespace Database\Seeders;
use App\Models\ingrediente;

use Illuminate\Database\Seeder;

class RecetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ingrediente::create([
            'nombre'=>'harina',
            'descripcion'=>'integral a base de maiz amarillo',
            'id_provedor'=>1   
        ]);
        ingrediente::create([
            'nombre'=>'huevo',
            'descripcion'=>'huevo del campo',
            'id_provedor'=>5   
        ]);
        ingrediente::create([
            'nombre'=>'queso',
            'descripcion'=>'queso rancio',
            'id_provedor'=>3   
        ]);
        ingrediente::create([
            'nombre'=>'queso',
            'descripcion'=>'queso casero',
            'id_provedor'=>4   
        ]);
        ingrediente::create([
            'nombre'=>'levadura',
            'descripcion'=>'levadura en polvo',
            'id_provedor'=>4   
        ]);

        ingrediente::create([
            'nombre'=>'agua',
            'descripcion'=>'agua purificada',
            'id_provedor'=>2   
        ]);
        ingrediente::create([
            'nombre'=>'dulce de leche',
            'descripcion'=>'delicia y dulce',
            'id_provedor'=>6   
        ]);

        
    }
}
