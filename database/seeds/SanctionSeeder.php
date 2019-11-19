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
            ['name'=>'Minutos acumulados en el mes','from'=>0,'to'=>30,'days'=>0,'type'=>'leve'],
            ['name'=>'Minutos acumulados en el mes','from'=>31,'to'=>45,'days'=>0.5,'type'=>'leve'],
            ['name'=>'Minutos acumulados en el mes','from'=>46,'to'=>60,'days'=>1,'type'=>'leve'],
            ['name'=>'Minutos acumulados en el mes','from'=>61,'to'=>90,'days'=>2,'type'=>'leve'],
            ['name'=>'Minutos acumulados en el mes','from'=>91,'to'=>120,'days'=>3,'type'=>'leve'],
            ['name'=>'Minutos acumulados en el mes primera vez','from'=>121,'to'=>1000,'days'=>4,'type'=>'leve'],
            ['name'=>'Minutos acumulados en el mes segunda vez','from'=>121,'to'=>1000,'days'=>6,'type'=>'leve'],
            ['name'=>'Numero de Omisiones primera vez','from'=>1,'to'=>1,'days'=>0.5,'type'=>'omision'],
            ['name'=>'Numero de Omisiones segunda vez','from'=>1,'to'=>2,'days'=>1,'type'=>'omision'],
            ['name'=>'Numero de Omisiones tercera vez','from'=>2,'to'=>3,'days'=>2,'type'=>'omision'],
        ];
        foreach ($sanctions as $sanction) {
            # code...
            App\Sanction::create($sanction);
        }
    }
}
