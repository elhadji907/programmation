<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $option1 = App\Option::firstOrCreate(["name"=>"Arabe"],["uuid"=>Str::uuid()]);
        $option2 = App\Option::firstOrCreate(["name"=>"Lettre moderne"],["uuid"=>Str::uuid()]);
        $option3 = App\Option::firstOrCreate(["name"=>"Lettre classique"],["uuid"=>Str::uuid()]);
        $option4 = App\Option::firstOrCreate(["name"=>"Science"],["uuid"=>Str::uuid()]);
        $option5 = App\Option::firstOrCreate(["name"=>"Technique"],["uuid"=>Str::uuid()]);
    }
}
