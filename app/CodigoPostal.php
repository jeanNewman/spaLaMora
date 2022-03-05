<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodigoPostal extends Model
{
    //
    protected $table = 'codigo_postal';
    protected $fillable = [
       'distrito', 'postal'
    ];

    public $timestamps = false;
}
