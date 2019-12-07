<?php

use Illuminate\Database\Seeder;

class SituationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $situation1 = App\Situation::firstOrCreate(["name"=>"Elève"],["uuid"=>Str::uuid()]);
        $situation2 = App\Situation::firstOrCreate(["name"=>"Etudiant(e)"],["uuid"=>Str::uuid()]);
        $situation3 = App\Situation::firstOrCreate(["name"=>"Employé(e)"],["uuid"=>Str::uuid()]);
        $situation4 = App\Situation::firstOrCreate(["name"=>"Recherche d'emploi"],["uuid"=>Str::uuid()]);
        $situation5 = App\Situation::firstOrCreate(["name"=>"Master"],["uuid"=>Str::uuid()]);
    }
}
