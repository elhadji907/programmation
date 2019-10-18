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
        $type1=App\TypesCourrier::firstOrCreate(["name"=>"Courriers arrives"],["categorie"=>"Courriers arrives"],["uuid"=>Str::uuid()]);
        $type2=App\TypesCourrier::firstOrCreate(["name"=>"Courriers departs"],["categorie"=>"Courriers arrives"],["uuid"=>Str::uuid()]);
        $type3=App\TypesCourrier::firstOrCreate(["name"=>"Courriers internes"],["categorie"=>"Courriers arrives"],["uuid"=>Str::uuid()]);
    }
}
