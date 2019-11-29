<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypesDirectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type1=App\TypesDirection::firstOrCreate(["name"=>"Direction"],["uuid"=>Str::uuid()]);
        $type2=App\TypesDirection::firstOrCreate(["name"=>"Service"],["uuid"=>Str::uuid()]);
        $type3=App\TypesDirection::firstOrCreate(["name"=>"Aucune"],["uuid"=>Str::uuid()]);
    }
}
