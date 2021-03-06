<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorie1=App\Category::firstOrCreate(["name"=>"3-6"],["uuid"=>Str::uuid()]);
        $categorie2=App\Category::firstOrCreate(["name"=>"4-1"],["uuid"=>Str::uuid()]);
        $categorie3=App\Category::firstOrCreate(["name"=>"5-1"],["uuid"=>Str::uuid()]);
        $categorie4=App\Category::firstOrCreate(["name"=>"7-2"],["uuid"=>Str::uuid()]);
        $categorie5=App\Category::firstOrCreate(["name"=>"3-2"],["uuid"=>Str::uuid()]);
    }
}
