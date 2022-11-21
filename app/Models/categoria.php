<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;
    use HasFactory;
    public $table = "categorias";
    protected $fillable = 
    [
        "id",
        "nombre",
        "estado",
    ];

    public static $rules= 
    [
        "nombre"=>'required|string',
        "estado"=> 'in:1,0',
    ];
}