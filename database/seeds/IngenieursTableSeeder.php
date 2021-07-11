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
        $ingenieur1 = App\Ingenieur::firstOrCreate(["name"=>"Mourtalla BITEYE"],["sigle"=>"MRB"],["uuid"=>Str::uuid()]);
        $ingenieur2 = App\Ingenieur::firstOrCreate(["name"=>"Dieynenba TALLA"],["sigle"=>"DYT"],["uuid"=>Str::uuid()]);
        $ingenieur3 = App\Ingenieur::firstOrCreate(["name"=>"Edouard MANSAMA"],["sigle"=>"EDM"],["uuid"=>Str::uuid()]);
        $ingenieur4 = App\Ingenieur::firstOrCreate(["name"=>"Yacine YADE"],["sigle"=>"YCY"],["uuid"=>Str::uuid()]);
        $ingenieur5 = App\Ingenieur::firstOrCreate(["name"=>"Sokhna Aminata SARR"],["sigle"=>"SAS"],["uuid"=>Str::uuid()]);
    }
}
