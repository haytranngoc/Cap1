<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ["name" => "USER"],
            ["name" => "ADMIN"],
        ];
        DB::table("roles")->insert($roles);
    }
}
