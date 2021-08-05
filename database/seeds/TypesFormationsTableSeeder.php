<?php

use Illuminate\Database\Seeder;

class TypesFormationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type1=App\TypesFormation::firstOrCreate(["name"=>"Individuelle"],["uuid"=>Str::uuid()]);
        $type2=App\TypesFormation::firstOrCreate(["name"=>"Collective"],["uuid"=>Str::uuid()]);
    }
}
