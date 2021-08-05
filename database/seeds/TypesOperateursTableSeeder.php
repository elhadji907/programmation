<?php

use Illuminate\Database\Seeder;

class TypesOperateursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type1=App\TypesOperateur::firstOrCreate(["name"=>"GIE"],["uuid"=>Str::uuid()]);
        $type2=App\TypesOperateur::firstOrCreate(["name"=>"Association"],["uuid"=>Str::uuid()]);
        $type2=App\TypesOperateur::firstOrCreate(["name"=>"Entreprise"],["uuid"=>Str::uuid()]);
        $type2=App\TypesOperateur::firstOrCreate(["name"=>"Institution publique"],["uuid"=>Str::uuid()]);
        $type2=App\TypesOperateur::firstOrCreate(["name"=>"Autres"],["uuid"=>Str::uuid()]);
    }
}
