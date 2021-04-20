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
        $programme1  = App\Programme::firstOrCreate(["name"=>"Projet d'employabilite des jeunes par l'apprentissage"],["sigle"=>"PEJA"],["uuid"=>Str::uuid()]);
        $programme2  = App\Programme::firstOrCreate(["name"=>"Projet d’appui au Développement des Compétences et de l’Entreprenariat des Jeunes dans les secteurs porteurs"],["sigle"=>"PDCEJ"],["uuid"=>Str::uuid()]);
        $programme3  = App\Programme::firstOrCreate(["name"=>"Programme triennal de renforcement des compétences des artisans"],["sigle"=>"PRECA"],["uuid"=>Str::uuid()]);
    }
}
