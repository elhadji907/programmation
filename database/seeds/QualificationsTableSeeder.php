<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class QualificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qualificationn1 = App\Qualification::firstOrCreate(["name"=>"Initiation"],["uuid"=>Str::uuid()]);
        $qualificationn2 = App\Qualification::firstOrCreate(["name"=>"Qualifiante"],["uuid"=>Str::uuid()]);
    }
}
