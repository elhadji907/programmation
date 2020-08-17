<?php

use Illuminate\Database\Seeder;

class TypesdemandesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type1=App\Typedemande::firstOrCreate(["name"=>"Individuelle"],["uuid"=>Str::uuid()]);
        $type2=App\Typedemande::firstOrCreate(["name"=>"Collective"],["uuid"=>Str::uuid()]);
        $type3=App\Typedemande::firstOrCreate(["name"=>"Programme PDCEJ"],["uuid"=>Str::uuid()]);
    }
}
