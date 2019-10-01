<?php

use Illuminate\Database\Seeder;

class CajasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cajas = [
            ['name' => 'Caja de Caminos'],
            ['name' => 'Caja Nacional de Salud'],
            ['name' => 'Caja Petrolera']
        ];

        foreach($cajas as $caja){
            App\HealthBox::create($caja);
        }
    }
}
