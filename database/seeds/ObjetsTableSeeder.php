<?php

use Illuminate\Database\Seeder;

class ObjetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objet1=App\Objet::firstOrCreate(["name"=>"Demande de formation"],["uuid"=>Str::uuid()]);
        $objet2=App\Objet::firstOrCreate(["name"=>"Demande de prise en charge"],["uuid"=>Str::uuid()]);
        $objet3=App\Objet::firstOrCreate(["name"=>"Demande d'agrément"],["uuid"=>Str::uuid()]);
    }
}
