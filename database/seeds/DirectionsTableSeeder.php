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
        $direction1=App\Direction::firstOrCreate(["name"=>"DIOF"],["uuid"=>Str::uuid()]);
        $direction2=App\Direction::firstOrCreate(["name"=>"DEC"],["uuid"=>Str::uuid()]);
        $direction3=App\Direction::firstOrCreate(["name"=>"DPP"],["uuid"=>Str::uuid()]);
        $direction4=App\Direction::firstOrCreate(["name"=>"COM"],["uuid"=>Str::uuid()]);
        $direction5=App\Direction::firstOrCreate(["name"=>"CONS"],["uuid"=>Str::uuid()]);
        $direction5=App\Direction::firstOrCreate(["name"=>"SI"],["uuid"=>Str::uuid()]);
        $direction6=App\Direction::firstOrCreate(["name"=>"DAF"],["uuid"=>Str::uuid()]);
        $direction7=App\Direction::firstOrCreate(["name"=>"EDITION"],["uuid"=>Str::uuid()]);
        $direction8=App\Direction::firstOrCreate(["name"=>"Aucune"],["uuid"=>Str::uuid()]);
    }
}
