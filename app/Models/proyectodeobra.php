<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyectodeobra extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','lugar', 'Observacion', 'Responsable', 'estado'];
    protected $table = 'proyectosdeobras';
}
