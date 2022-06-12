<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acta_Entrega_model extends Model
{
    use HasFactory;
    protected $table='acta_entrega';
    protected $fillable=
    [
        'hora_entrega',
        'fecha_entrega',
    ];
}
