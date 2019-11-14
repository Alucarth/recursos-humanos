<?php

use Illuminate\Database\Seeder;

class locationSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

	public function run() {
		$locations = [
			["city_id" => 4, "name" => "EBA CENTRAL"],
			["city_id" => 1, "name" => "GONZALO MORENO"],
			["city_id" => 9, "name" => "SAN LORENZO"],
			["city_id" => 6, "name" => "VILLA NUEVA"],
			["city_id" => 6, "name" => "SANTOS MERCADO"],
			["city_id" => 6, "name" => "BOLPEBRA"],
			["city_id" => 6, "name" => "MAGDALENA"],
			["city_id" => 1, "name" => "BAURES"],
			["city_id" => 4, "name" => "IXIAMAS"],
			["city_id" => 1, "name" => "RIBERALTA"],
			["city_id" => 6, "name" => "EL SENA"],
			["city_id" => 4, "name" => "ACHACACHI"],
			["city_id" => 3, "name" => "IVIRGAZAMA"],
			["city_id" => 5, "name" => "CHALLAPATA"],
			["city_id" => 4, "name" => "PLANTA DEV"],
			["city_id" => 1, "name" => "SAN ANDRES"],
			["city_id" => 3, "name" => "SAMUZABETY"],
			["city_id" => 3, "name" => "SHINAHOTA"],
			["city_id" => 2, "name" => "MONTEAGUDO"],
			["city_id" => 2, "name" => "CAMARGO"],
			["city_id" => 2, "name" => "EL VILLAR"],
			["city_id" => 4, "name" => "IRUPANA"],
			["city_id" => 3, "name" => "VALLE SACTA"],
			["city_id" => 3, "name" => "VALLE 14 SEPTIEMBRE"],
			["city_id" => 4, "name" => "CARANAVI"],
			["city_id" => 6, "name" => "COBIJA"],
		];
		foreach ($locations as $loc) {

			App\Location::create($loc);
		}
	}
}
