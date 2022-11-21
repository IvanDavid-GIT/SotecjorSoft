<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_entrada extends Model
{
    use HasFactory;
    protected $fillable = ['IdMaterial', 'IdEntrada', 'CodigoEntrada' ,'Cantidad'];
    protected $table = 'detalle_entrada';
}
