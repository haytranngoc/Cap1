<?php

use Illuminate\Database\Seeder;

class CandidateTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('candidate_types')->insert([
            'name' => '0 - Không ưu tiên',
            'bonus_point' => 0.0,
        ]);

        DB::table('candidate_types')->insert([
            'name' => '1 - Dân tộc thiểu số',
            'bonus_point' => 0.25,
        ]);

        DB::table('candidate_types')->insert([
            'name' => '2 - Thương binh, bệnh binh, quân nhân,...',
            'bonus_point' => 0.25,
        ]);

        DB::table('candidate_types')->insert([
            'name' => '3 - Con liệt sĩ, thương bệnh binh nặng',
            'bonus_point' => 0.5
        ]);
    }
}
