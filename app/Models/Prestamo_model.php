<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo_model extends Model
{
    use HasFactory;
    protected $table='prestamo';
    protected $fillable=
    [
        'num_comprobante_prestamo',
            'fecha_emitida_prestamo',
            'hora_emitida_prestamo',
            'img_arma',
    ];
}
