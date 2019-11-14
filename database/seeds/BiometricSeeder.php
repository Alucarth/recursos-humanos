<?php

use Illuminate\Database\Seeder;

class BiometricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $biometrics = [
            ['name'=>"Sistemas Pruebas",'address'=>'Piso 1','ip'=>'172.16.1.234','port'=>'4370']
        ];
        foreach($biometrics as $biometric)
        {
            App\Biometric::create($biometric);
        }
    }
}
