<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoAlmacen extends Model
{
    use HasFactory;
    
    protected $table = 'producto_almacen';
    protected $primaryKey ='id';
    protected $fillable = [
        'id_producto',
        'id_almacen',
        'stock',
        'estado'
    ];
    public $timestamps=false;
}
