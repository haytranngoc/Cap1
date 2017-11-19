<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'country_id' => 1,
            'name' => 'Đà Nẵng',
        ]);

        DB::table('cities')->insert([
            'country_id' => 1,
            'name' => 'Hồ Chí Minh',
        ]);

        DB::table('cities')->insert([
            'country_id' => 1,
            'name' => 'Hà Nội',
        ]);
    }
}
