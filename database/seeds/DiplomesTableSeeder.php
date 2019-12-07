<?php

use Illuminate\Database\Seeder;

class DiplomesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diplome1 = App\Diplome::firstOrCreate(["name"=>"Certificat de fin d'étude élémentaire"],["options_id"=>"1"],["sigle"=>"CFEE"],["uuid"=>Str::uuid()]);
        $diplome2 = App\Diplome::firstOrCreate(["name"=>"Brevet de fin d'étude moyen"],["options_id"=>"1"],["sigle"=>"BFEM"],["uuid"=>Str::uuid()]);
        $diplome3 = App\Diplome::firstOrCreate(["name"=>"Baccalauréat"],["options_id"=>"1"],["sigle"=>"BAC"],["uuid"=>Str::uuid()]);
        $diplome4 = App\Diplome::firstOrCreate(["name"=>"Licence 1"],["options_id"=>"1"],["sigle"=>"BAC + 1"],["uuid"=>Str::uuid()]);
        $diplome5 = App\Diplome::firstOrCreate(["name"=>"Licence 2"],["options_id"=>"1"],["sigle"=>"BAC + 2"],["uuid"=>Str::uuid()]);
        $diplome6 = App\Diplome::firstOrCreate(["name"=>"Licence 3"],["options_id"=>"1"],["sigle"=>"BAC + 3"],["options_id"=>"5"],["uuid"=>Str::uuid()]);
        $diplome7 = App\Diplome::firstOrCreate(["name"=>"Master 1"],["options_id"=>"1"],["sigle"=>"BAC + 4"],["uuid"=>Str::uuid()]);
        $diplome8 = App\Diplome::firstOrCreate(["name"=>"Master 2"],["options_id"=>"1"],["sigle"=>"BAC + 5"],["uuid"=>Str::uuid()]);
    }
}