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
            ["name"=> "Hijo"],
            ["name"=> "Hija"],
        ];
        foreach($kinships as $kinship){

            App\Kinship::create($kinship);
        }
    }
}
