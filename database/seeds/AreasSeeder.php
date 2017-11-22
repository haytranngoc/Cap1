<?php

use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            'name' => 'Khu vực 3',
            'bonus_point' => 0.0,
        ]);

        DB::table('areas')->insert([
            'name' => 'Khu vực 1',
            'bonus_point' => 1.5,
        ]);

        DB::table('areas')->insert([
            'name' => 'Khu vực 2 - Nông thôn',
            'bonus_point' => 1.0,
        ]);

        DB::table('areas')->insert([
            'name' => 'Khu vực 2',
            'bonus_point' => 0.5
        ]);
    }
}
