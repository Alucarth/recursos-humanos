<?php

use Illuminate\Database\Seeder;

class TypeHoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $type_hours = [
            ['name'=>'HORARIO OFICINA'],
            ['name'=>'HORARIO DE LACTANCIA'],
        ];

        foreach($type_hours as $type_hour)
        {
            App\TypeHour::create($type_hour);
        }
    }
}
