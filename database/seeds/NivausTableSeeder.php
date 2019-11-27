<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NivausTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nivau1=App\Nivaus::firstOrCreate(["name"=>"Primaire"],["uuid"=>Str::uuid()]);
        $nivau2=App\Nivaus::firstOrCreate(["name"=>"Moyen"],["uuid"=>Str::uuid()]);
        $nivau3=App\Nivaus::firstOrCreate(["name"=>"Secondaire"],["uuid"=>Str::uuid()]);
        $nivau4=App\Nivaus::firstOrCreate(["name"=>"Supérieur"],["uuid"=>Str::uuid()]);
        $nivau5=App\Nivaus::firstOrCreate(["name"=>"Aucun"],["uuid"=>Str::uuid()]);
    }
}
