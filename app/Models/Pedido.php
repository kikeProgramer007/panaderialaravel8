<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidos';
    protected $primaryKey ='id';
    protected $fillable = [
        'fecha',
        'fechaentrega',
        'montototal',
        'estado',
        'id_ubicacion',
        'id_empleado'
    ];
    //UNO A UNO (INVERSO): Lo mismo, Ayuda a traer los datos con el que esta relacionado, es decir la ubicacion de ese pedido
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }

    /*  Fuente:https://youtu.be/YRh7sYrxxM8
       
    PROBAR RELACION:
    
        > php artisan tinker
        > use App\Models\Ubicacion;
        > $ubicacion = Ubicacion::find(1); //Recupera es registro de esta ubicacion
        > $ubicacion->pedidos;      //Acede al pedido de esa ubicacion

        > use App\Models\Pedidos;
        > $pedido = Ubicacion::find(1); //Recupera ese pedido
        > $ubicacion->ubicacion;        //Acede al pedido de esa ubicacion

    */
}