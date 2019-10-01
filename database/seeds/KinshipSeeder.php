<?php

use Illuminate\Database\Seeder;

class KinshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kinships = [
            ["name"=> "Hijo(a)"],
            ["name"=> "Esposo(a)"],
            ["name"=> "Conyugue"],
            ["name"=> "Madre"],
            ["name"=> "Padre"],
            ["name"=> "Otro"],
        ];
        foreach($kinships as $kinship){

            App\Kinship::create($kinship);
        }
    }
}
