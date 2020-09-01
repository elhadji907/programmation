<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProgrammesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programme1  = App\Programme::firstOrCreate(["name"=>"Aucun"],["sigle"=>"Aucun"],["uuid"=>Str::uuid()]);
        $programme2  = App\Programme::firstOrCreate(["name"=>"Projet d’appui au Développement des Compétences 
        et de l’Entreprenariat des Jeunes dans les secteurs porteurs"],["sigle"=>"PDCEJ"],["uuid"=>Str::uuid()]);
    }
}
