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
            ['name'=>'COMISIÓN','description'=>'Para actividades de carácter institucional en lugares diferentes al habitual con plazos mayores a una jornada','version'=>'01','code'=>'FOR-RRHH-01'],
            ['name'=>'PERMISO OFICIAL POR HORAS','description'=>'Para actividades de carácter institucional en un lugar diferente al habitual por un plazo menor a una jornada','version'=>'01','code'=>'FOR-RRHH-02'],
            // ['name'=>'Permiso por Beca','version'=>'01','code'=>'FOR-RRHH-01'],
            ['name'=>'ASUETO','label1'=>'Resolucion Administrativa Nro','description'=>'Permiso para suspender actividades por un periodo determinado para actividades de manera específica o de manera libre','version'=>'01','code'=>'FOR-RRHH-03'],
            ['name'=>'TOLERANCIA','label1'=>'Indivudual','label2'=>'Grupal','description'=>'Permiso que permite la flexibilización del tiempo al ingreso o la salida por motivo específico.','version'=>'01','code'=>'FOR-RRHH-04'],
            ['name'=>'PERMISO PERSONAL CON GOCE DE HABERES','label1'=>'Con tiempo de trabajo','label2'=>'A cuenta de vacación','description'=>'Permiso para realizar actividades personales, si se pasa de las 2 horas mensuales, se deberá realizar una compensación por el tiempo extra','version'=>'01','code'=>'FOR-RRHH-05'],
            ['name'=>'PERMISO PERSONAL SIN GOCE DE HABERES','label1'=>'Salud Personal','label2'=>'Salud de un familiar','label3'=>'Cursos o becas no Estatales','label4'=>'Participacion de otras actividades','label5'=>'Otros','description'=>'Permiso para realizar actividades personales, por lapsos superiores a una jornada, cuando no cuente con vacaciones adquiridas','version'=>'01','code'=>'FOR-RRHH-06'],
            ['name'=>'DESCANSO ANUAL','label1'=>'Periodo de descanso anual','label2'=>'Salud de un familiar','label3'=>'Cursos o becas no Estatales','label4'=>'Participacion de otras actividades','label5'=>'Otros','description'=>'','version'=>'01','code'=>'FOR-RRHH-08'],
        ];
        foreach($request_types as $request_type)
        {
            App\RequestType::create($request_type);
        }
    }
}
