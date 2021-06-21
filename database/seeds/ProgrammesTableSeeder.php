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
        $programme1  = App\Programme::firstOrCreate(["name"=>"Formation de 1.000 jeunes dans les métiers du numérique"],["sigle"=>"NUMERIQUE(1.000)"],["uuid"=>Str::uuid()]);
        $programme2  = App\Programme::firstOrCreate(["name"=>"Formation de 500 Développeurs web/mobile"],["sigle"=>"DEVELOPPEURS WEB/MOBILE"],["uuid"=>Str::uuid()]);
        $programme3  = App\Programme::firstOrCreate(["name"=>"Programme triennal de renforcement des compétences des artisans"],["sigle"=>"PRECA"],["uuid"=>Str::uuid()]);
    }
}
