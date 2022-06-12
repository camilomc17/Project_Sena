<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //importo la DB

class Acta_Entrega_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('acta_entrega')->insert
       (
        [
            'hora_entrega'=>'12:00 am',
            'fecha_entrega'=>'05/2020/17'
        ]
        );

    }
}
