<?php

use Illuminate\Database\Seeder;

class IngenieursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingenieur1 = App\Ingenieur::firstOrCreate(["name"=>"Mourtalla BITEYE"],["matricule"=>"MRB"],["uuid"=>Str::uuid()]);
        $ingenieur2 = App\Ingenieur::firstOrCreate(["name"=>"Dieynenba TALLA"],["matricule"=>"DYT"],["uuid"=>Str::uuid()]);
        $ingenieur3 = App\Ingenieur::firstOrCreate(["name"=>"Edouard MANSAMA"],["matricule"=>"EDM"],["uuid"=>Str::uuid()]);
        $ingenieur4 = App\Ingenieur::firstOrCreate(["name"=>"Yacine YADE"],["matricule"=>"YCY"],["uuid"=>Str::uuid()]);
        $ingenieur5 = App\Ingenieur::firstOrCreate(["name"=>"Sokhna Aminata SARR"],["matricule"=>"SAS"],["uuid"=>Str::uuid()]);
    }
}
