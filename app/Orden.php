<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordenes';
    protected $fillable = [

        'idusuario',
        'nombre_cliente',
        'telefono',
        'destino',
        'distrito',
        'banco',
        'formaPago',
        'deposito',
        'total',
        'ruta',        
        'observacion',
        'fecha_entrega',
        'estado'
    ];
}
