<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
   protected $table = 'detalle_ordenes';
    protected $fillable = [
        'idordenes',
        'idarticulo',
        'articulo',
        'cantidad',
        'precio',
        'medida',
        'observacion',
        'adicional'
    ];
    public $timestamps = false;
}
