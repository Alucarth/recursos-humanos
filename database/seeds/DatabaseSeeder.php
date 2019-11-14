<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		// $this->call(UsersTableSeeder::class);
		$this->call(CitySeeder::class);
		$this->call(PositionSeeder::class);
		$this->call(ManagementSeeder::class);
		$this->call(UnitSeeder::class);
		$this->call(locationSeeder::class);
		$this->call(EmployeeSeeder::class);
	}
}
