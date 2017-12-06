<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(CandidateTypesSeeder::class);
        $this->call(AppliesSeeder::class);
        $this->call(AreasSeeder::class);
        $this->call(RolesSeeder::class);
    }
}
