<?php

use Illuminate\Database\Seeder;

class StatutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statut1=App\Statut::firstOrCreate(["name"=>"Attente"],["niveau"=>"Service informatique"],["uuid"=>Str::uuid()]);
        $statut2=App\Statut::firstOrCreate(["name"=>"Programmée"],["niveau"=>"Service informatique"],["uuid"=>Str::uuid()]);
        $statut3=App\Statut::firstOrCreate(["name"=>"En cours"],["niveau"=>"DIOF"],["uuid"=>Str::uuid()]);
        $statut4=App\Statut::firstOrCreate(["name"=>"Terminée"],["niveau"=>"DEC"],["uuid"=>Str::uuid()]);
        $statut5=App\Statut::firstOrCreate(["name"=>"Diplôme en cours d'édition"],["niveau"=>"Service informatique"],["uuid"=>Str::uuid()]);
        $statut6=App\Statut::firstOrCreate(["name"=>"Diplôme en signature"],["niveau"=>"DG"],["uuid"=>Str::uuid()]);
        $statut7=App\Statut::firstOrCreate(["name"=>"Diplôme disponible"],["niveau"=>"DEC"],["uuid"=>Str::uuid()]);
        $statut8=App\Statut::firstOrCreate(["name"=>"Diplôme retiré"],["niveau"=>"DEC"],["uuid"=>Str::uuid()]);
<<<<<<< HEAD
        
=======
>>>>>>> 3cb40d346f7af160a2c3ec9fda13f1a64ec23555
    }
}
