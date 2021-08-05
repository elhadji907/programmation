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
        $type1=App\TypesDemande::firstOrCreate(["name"=>"Individuelle"],["uuid"=>Str::uuid()]);
        $type2=App\TypesDemande::firstOrCreate(["name"=>"Collective"],["uuid"=>Str::uuid()]);
    }
}
