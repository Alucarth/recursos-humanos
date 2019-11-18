<?php

use Illuminate\Database\Seeder;

class SanctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sanctions =[
            ['name'=>'Minutos acumulados en el mes','from_minutes'=>0,'to_minutes'=>30,'days'=>0,'type'=>'leve'],
            ['name'=>'Minutos acumulados en el mes','from_minutes'=>31,'to_minutes'=>45,'days'=>0.5,'type'=>'leve'],
            ['name'=>'Minutos acumulados en el mes','from_minutes'=>46,'to_minutes'=>60,'days'=>1,'type'=>'leve'],
            ['name'=>'Minutos acumulados en el mes','from_minutes'=>61,'to_minutes'=>90,'days'=>2,'type'=>'leve'],
            ['name'=>'Minutos acumulados en el mes','from_minutes'=>91,'to_minutes'=>120,'days'=>3,'type'=>'leve'],
            ['name'=>'Minutos acumulados en el mes primera vez','from_minutes'=>121,'to_minutes'=>1000,'days'=>4,'type'=>'leve'],
            ['name'=>'Minutos acumulados en el mes segunda vez','from_minutes'=>121,'to_minutes'=>1000,'days'=>6,'type'=>'leve'],
            ['name'=>'Numero de Omisiones primera vez','days'=>0.5,'type'=>'omision'],
            ['name'=>'Numero de Omisiones segunda vez','days'=>1,'type'=>'omision'],
            ['name'=>'Numero de Omisiones tercera vez','days'=>2,'type'=>'omision'],
        ];
        foreach ($sanctions as $sanction) {
            # code...
            App\Sanction::create($sanction);
        }
    }
}
