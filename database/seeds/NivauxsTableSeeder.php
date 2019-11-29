<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NivauxsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nivaux1=App\Nivaux::firstOrCreate(["name"=>"Elementaire"],["uuid"=>Str::uuid()]);
        $nivaux2=App\Nivaux::firstOrCreate(["name"=>"Moyen"],["uuid"=>Str::uuid()]);
        $nivaux3=App\Nivaux::firstOrCreate(["name"=>"Secondaire"],["uuid"=>Str::uuid()]);
        $nivaux4=App\Nivaux::firstOrCreate(["name"=>"Supérieur"],["uuid"=>Str::uuid()]);
        $nivaux5=App\Nivaux::firstOrCreate(["name"=>"Aucun"],["uuid"=>Str::uuid()]);
    }
}
