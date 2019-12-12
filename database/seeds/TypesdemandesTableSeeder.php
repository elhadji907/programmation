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
        $type1=App\Typesdemande::firstOrCreate(["name"=>"Individuelle"],["uuid"=>Str::uuid()]);
        $type2=App\Typesdemande::firstOrCreate(["name"=>"Collective"],["uuid"=>Str::uuid()]);
    }
}
