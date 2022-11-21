<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'categoria', 'medida','Estado','stock', 'stockMin','descripcion'];
    protected $table = 'materiales';
}
