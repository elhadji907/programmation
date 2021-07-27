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
        $type1=App\TypesOperateur::firstOrCreate(["name"=>"Privé"],["uuid"=>Str::uuid()]);
        $type2=App\TypesOperateur::firstOrCreate(["name"=>"Publique"],["uuid"=>Str::uuid()]);
    }
}
