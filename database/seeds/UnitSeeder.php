<?php

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $unities = [
            ['name' => 'PROYECTOS','managament_id'=>2],
            ['name' => 'NORMAS Y CALIDAD','managament_id'=>2],
            ['name' => 'PLANIFICACION','managament_id'=>2],
            ['name' => 'SISTEMAS','managament_id'=>2],
        ];
    }
}
