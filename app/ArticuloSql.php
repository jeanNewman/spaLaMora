<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticuloSql extends Model
{
    protected $table = 'articulos';
    protected $connection = 'sqlsrv';
    
}
