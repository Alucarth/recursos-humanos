<?php

use Illuminate\Database\Seeder;

class RequestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $request_types = [
            ['name'=>'Permiso por Comision'],
            ['name'=>'Permiso por Horas'],
            ['name'=>'Permiso por Beca'],
            ['name'=>'Permiso por Asueto','label1'=>'Resolucion Administrativa Nro'],
            ['name'=>'Permiso por Tolerancia','label1'=>'Indivudual','label2'=>'Grupal'],
            ['name'=>'Permiso con Goce de Haberes','label1'=>'Con tiempo de trabajo','label2'=>'A cuenta de vacación'],
            ['name'=>'Permiso sin Goce de Haberes','label1'=>'Salud Personal','label2'=>'Salud de un familiar','label3'=>'Cursos o becas no Estatales','label4'=>'Participacion de otras actividades','label5'=>'Otros'],
        ];
        foreach($request_types as $request_type)
        {
            App\RequestType::create($request_type);
        }
    }
}
