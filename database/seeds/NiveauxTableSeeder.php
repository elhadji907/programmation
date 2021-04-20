<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NiveauxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveaux1=App\Niveaux::firstOrCreate(["name"=>"Elementaire"],["uuid"=>Str::uuid()]);
        $niveaux2=App\Niveaux::firstOrCreate(["name"=>"Moyen"],["uuid"=>Str::uuid()]);
        $niveaux3=App\Niveaux::firstOrCreate(["name"=>"Secondaire"],["uuid"=>Str::uuid()]);
        $niveaux4=App\Niveaux::firstOrCreate(["name"=>"Supérieur"],["uuid"=>Str::uuid()]);
        $niveaux5=App\Niveaux::firstOrCreate(["name"=>"Aucun"],["uuid"=>Str::uuid()]);
    }
}
