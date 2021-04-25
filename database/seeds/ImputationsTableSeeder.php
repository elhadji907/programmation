<?php

use Illuminate\Database\Seeder;

class ImputationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imp1=App\Imputation::firstOrCreate(["destinataire"=>"Directeur Général"],["sigle"=> "DG" ],["uuid"=>Str::uuid()]);
        $imp2=App\Imputation::firstOrCreate(["destinataire"=>"Direction de l'Evaluation et de la Certification"],["sigle"=> "DEC" ],["uuid"=>Str::uuid()]);
        $imp3=App\Imputation::firstOrCreate(["destinataire"=>"Direction de la planification des projets"],["sigle"=> "DPP" ],["uuid"=>Str::uuid()]);
        $imp4=App\Imputation::firstOrCreate(["destinataire"=>"Direction Administrative et Financière"],["sigle"=> "DAF" ],["uuid"=>Str::uuid()]);
        $imp5=App\Imputation::firstOrCreate(["destinataire"=>"Direction de l'Ingénierie et de la Formation"],["sigle"=> "DIOF" ],["uuid"=>Str::uuid()]);
    }
}
