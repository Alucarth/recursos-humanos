<?php

use Illuminate\Database\Seeder;

class ManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $managements = [
            ['name' => 'COMUNICACIÓN'],
            ['name' => 'GERENCIA DE PLANIFICACION Y DESARROLLO'],
            ['name' => 'GERENCIA ADMINISTRATIVA FINANCIERA'],
            ['name' => 'GERENCIA DE PRODUCCION DE LACTEOS'],
            ['name' => 'COORDINACIÓN GENERAl'],
            ['name' => 'AREA LEGAL'],
            ['name' => 'AUDITORIA INTERNA'],
            ['name' => 'GERENCIA DE PRODUCCION DE ENDULZANTES Y FRUTAS'],
            ['name' => 'GERENCIA EJECUTIVA'],
        ];
        foreach ($managements as $magament) {
            # code...
            App\Management::create($magament);
        }
    }
}
