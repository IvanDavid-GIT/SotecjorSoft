<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_salida extends Model
{
    use HasFactory;
    protected $fillable = ['IdMaterial', 'IdSalida','CodigoSalida' ,'Cantidad'];
    protected $table = 'detalle_salida';
}
