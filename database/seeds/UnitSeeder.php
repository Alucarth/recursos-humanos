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
            ['name' => 'PROYECTOS','managament_id'=>2],//1
            ['name' => 'NORMAS Y CALIDAD','managament_id'=>2],
            ['name' => 'PLANIFICACION','managament_id'=>2],
            ['name' => 'SISTEMAS','managament_id'=>2],

            ['name' => 'SERVICIOS GENERALES','managament_id'=>3],//5
            ['name' => 'ACTIVOS FIJOS','managament_id'=>3],
            ['name' => 'TRIBUTARIA','managament_id'=>3],
            ['name' => 'PRESUPUESTOS','managament_id'=>3],
            ['name' => 'TESORERIA','managament_id'=>3],
            ['name' => 'CONTABILIDAD','managament_id'=>3],//10
            ['name' => 'RECURSOS HUMANOS','managament_id'=>3],
            ['name' => 'CONTRATACIONES','managament_id'=>3],
            ['name' => 'FINANCIERA','managament_id'=>3],
            ['name' => 'ARCHIVO VILLA FATIMA','managament_id'=>3],

            ['name' => 'PRODUCCION','managament_id'=>4],//15
            ['name' => 'APROVISIONAMIENTO','managament_id'=>4],
            ['name' => 'MANTENIMIENTO','managament_id'=>4],
            ['name' => 'CALIDAD','managament_id'=>4],

            ['name' => 'DESAYUNO ESCOLAR VILLA FATIMA','managament_id'=>5],
        ];

        foreach ($unities as $unit) {
            App\Unity::create($unit);
        }
    }
}
