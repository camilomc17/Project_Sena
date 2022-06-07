<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //importo el DB
class Prestamo_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prestamo')->insert([
            'num_comprobante_prestamo'=>'222',
            'fecha_emitida_prestamo'=>'05/10/22',
           'hora_emitida_prestamo'=>'23:22',
            'img_arma'=>'ree',
        ]);
    }
}
