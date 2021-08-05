<?php

use Illuminate\Database\Seeder;

class DepartementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $departement1  = App\Departement::firstOrCreate(["nom"=>"Tambacounda"],["regions_id"=>"1"],["uuid"=>Str::uuid()]);
        $departement2  = App\Departement::firstOrCreate(["nom"=>"Bakel"],["regions_id"=>"1"],["uuid"=>Str::uuid()]);
        $departement3  = App\Departement::firstOrCreate(["nom"=>"Goudiry"],["regions_id"=>"1"],["uuid"=>Str::uuid()]);
        $departement4  = App\Departement::firstOrCreate(["nom"=>"Koumpentoum"],["regions_id"=>"1"],["uuid"=>Str::uuid()]);

        $departement5  = App\Departement::firstOrCreate(["nom"=>"Bignona"],["regions_id"=>"2"],["uuid"=>Str::uuid()]);
        $departement6  = App\Departement::firstOrCreate(["nom"=>"Oussouye"],["regions_id"=>"2"],["uuid"=>Str::uuid()]);
        $departement7  = App\Departement::firstOrCreate(["nom"=>"Ziguinchor"],["regions_id"=>"2"],["uuid"=>Str::uuid()]);

        $departement8  = App\Departement::firstOrCreate(["nom"=>"Bambey"],["regions_id"=>"3"],["uuid"=>Str::uuid()]);
        $departement9  = App\Departement::firstOrCreate(["nom"=>"Diourbel"],["regions_id"=>"3"],["uuid"=>Str::uuid()]);
        $departement10  = App\Departement::firstOrCreate(["nom"=>"Mbacké"],["regions_id"=>"3"],["uuid"=>Str::uuid()]);

        $departement11 = App\Departement::firstOrCreate(["nom"=>"Dagana"],["regions_id"=>"4"],["uuid"=>Str::uuid()]);
        $departement12 = App\Departement::firstOrCreate(["nom"=>"Podor"],["regions_id"=>"4"],["uuid"=>Str::uuid()]);
        $departement13 = App\Departement::firstOrCreate(["nom"=>"Saint-Louis"],["regions_id"=>"4"],["uuid"=>Str::uuid()]);

        $departement14 = App\Departement::firstOrCreate(["nom"=>"Dakar"],["regions_id"=>"5"],["uuid"=>Str::uuid()]);
        $departement15 = App\Departement::firstOrCreate(["nom"=>"Pikine"],["regions_id"=>"5"],["uuid"=>Str::uuid()]);
        $departement16 = App\Departement::firstOrCreate(["nom"=>"Rufisque"],["regions_id"=>"5"],["uuid"=>Str::uuid()]);
        $departement17 = App\Departement::firstOrCreate(["nom"=>"Guédiawaye"],["regions_id"=>"5"],["uuid"=>Str::uuid()]);
        $departement18 = App\Departement::firstOrCreate(["nom"=>"Keur Massar"],["regions_id"=>"5"],["uuid"=>Str::uuid()]);

        $departement19 = App\Departement::firstOrCreate(["nom"=>"Kaolack"],["regions_id"=>"6"],["uuid"=>Str::uuid()]);
        $departement20 = App\Departement::firstOrCreate(["nom"=>"Nioro du rip"],["regions_id"=>"6"],["uuid"=>Str::uuid()]);
        $departement21 = App\Departement::firstOrCreate(["nom"=>"Guinguinéo"],["regions_id"=>"6"],["uuid"=>Str::uuid()]);

        $departement22 = App\Departement::firstOrCreate(["nom"=>"Mbour"],["regions_id"=>"7"],["uuid"=>Str::uuid()]);
        $departement23 = App\Departement::firstOrCreate(["nom"=>"Thiès"],["regions_id"=>"7"],["uuid"=>Str::uuid()]);
        $departement24 = App\Departement::firstOrCreate(["nom"=>"Tivaouane"],["regions_id"=>"7"],["uuid"=>Str::uuid()]);

        $departement25 = App\Departement::firstOrCreate(["nom"=>"Kémémer"],["regions_id"=>"8"],["uuid"=>Str::uuid()]);
        $departement26 = App\Departement::firstOrCreate(["nom"=>"Linguère"],["regions_id"=>"8"],["uuid"=>Str::uuid()]);
        $departement27 = App\Departement::firstOrCreate(["nom"=>"Louga"],["regions_id"=>"8"],["uuid"=>Str::uuid()]);

        $departement28 = App\Departement::firstOrCreate(["nom"=>"Fatick"],["regions_id"=>"9"],["uuid"=>Str::uuid()]);
        $departement29 = App\Departement::firstOrCreate(["nom"=>"Foundiougne"],["regions_id"=>"9"],["uuid"=>Str::uuid()]);
        $departement30 = App\Departement::firstOrCreate(["nom"=>"Gossas"],["regions_id"=>"9"],["uuid"=>Str::uuid()]);

        $departement31 = App\Departement::firstOrCreate(["nom"=>"Kolda"],["regions_id"=>"10"],["uuid"=>Str::uuid()]);
        $departement32 = App\Departement::firstOrCreate(["nom"=>"Vélingara"],["regions_id"=>"10"],["uuid"=>Str::uuid()]);
        $departement33 = App\Departement::firstOrCreate(["nom"=>"Médina Yoro Foulah"],["regions_id"=>"10"],["uuid"=>Str::uuid()]);

        $departement34 = App\Departement::firstOrCreate(["nom"=>"Kanel"],["regions_id"=>"11"],["uuid"=>Str::uuid()]);
        $departement35 = App\Departement::firstOrCreate(["nom"=>"Matam"],["regions_id"=>"11"],["uuid"=>Str::uuid()]);
        $departement36 = App\Departement::firstOrCreate(["nom"=>"Ranérou"],["regions_id"=>"11"],["uuid"=>Str::uuid()]);

        $departement37 = App\Departement::firstOrCreate(["nom"=>"Kaffrine"],["regions_id"=>"12"],["uuid"=>Str::uuid()]);
        $departement38 = App\Departement::firstOrCreate(["nom"=>"Birkelane"],["regions_id"=>"12"],["uuid"=>Str::uuid()]);
        $departement39 = App\Departement::firstOrCreate(["nom"=>"Koungheul"],["regions_id"=>"12"],["uuid"=>Str::uuid()]);
        $departement34 = App\Departement::firstOrCreate(["nom"=>"Malem-Hodar"],["regions_id"=>"12"],["uuid"=>Str::uuid()]);

        $departement41 = App\Departement::firstOrCreate(["nom"=>"Kedougou"],["regions_id"=>"13"],["uuid"=>Str::uuid()]);
        $departement42 = App\Departement::firstOrCreate(["nom"=>"Salemata"],["regions_id"=>"13"],["uuid"=>Str::uuid()]);
        $departement43 = App\Departement::firstOrCreate(["nom"=>"Saraya"],["regions_id"=>"13"],["uuid"=>Str::uuid()]);

        $departement44 = App\Departement::firstOrCreate(["nom"=>"Sédhiou"],["regions_id"=>"14"],["uuid"=>Str::uuid()]);
        $departement45 = App\Departement::firstOrCreate(["nom"=>"Bounkiling"],["regions_id"=>"14"],["uuid"=>Str::uuid()]);
        $departement46 = App\Departement::firstOrCreate(["nom"=>"Goudomp"],["regions_id"=>"14"],["uuid"=>Str::uuid()]);
    }
}
