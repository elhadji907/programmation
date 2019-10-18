<?php

use Illuminate\Database\Seeder;

class DirectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=App\Direction::firstOrCreate(["name"=>"DIOF"],["uuid"=>Str::uuid()]);
        $role2=App\Direction::firstOrCreate(["name"=>"DEC"],["uuid"=>Str::uuid()]);
        $role3=App\Direction::firstOrCreate(["name"=>"DPP"],["uuid"=>Str::uuid()]);
        $role4=App\Direction::firstOrCreate(["name"=>"COM"],["uuid"=>Str::uuid()]);
        $role5=App\Direction::firstOrCreate(["name"=>"CONS"],["uuid"=>Str::uuid()]);
        $role5=App\Direction::firstOrCreate(["name"=>"SI"],["uuid"=>Str::uuid()]);
    }
}
