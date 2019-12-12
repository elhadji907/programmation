<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypesCourriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type1=App\TypesCourrier::firstOrCreate(["name"=>"Arrives"],["categorie"=>"Arrives"],["uuid"=>Str::uuid()]);
        $type2=App\TypesCourrier::firstOrCreate(["name"=>"Departs"],["categorie"=>"Departs"],["uuid"=>Str::uuid()]);
        $type3=App\TypesCourrier::firstOrCreate(["name"=>"Internes"],["categorie"=>"Internes"],["uuid"=>Str::uuid()]);
        $type3=App\TypesCourrier::firstOrCreate(["name"=>"Demande"],["categorie"=>"demandes"],["uuid"=>Str::uuid()]);
    }
}
