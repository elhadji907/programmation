<?php

use Illuminate\Database\Seeder;

class DomainesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $domaine1  = App\Domaine::firstOrCreate(["name"=>"Accueil - Secrétariat"],["secteurs_id"=>"1"],["uuid"=>Str::uuid()]);
        $domaine2  = App\Domaine::firstOrCreate(["name"=>"Agriculture - Agroalimentaire"],["secteurs_id"=>"1"],["uuid"=>Str::uuid()]);
        $domaine3  = App\Domaine::firstOrCreate(["name"=>"Architecture - Urbanisme"],["secteurs_id"=>"2"],["uuid"=>Str::uuid()]);
        $domaine4  = App\Domaine::firstOrCreate(["name"=>"Artisanat"],["secteurs_id"=>"2"],["uuid"=>Str::uuid()]);
        $domaine5  = App\Domaine::firstOrCreate(["name"=>"Arts - Audiovisuel"],["secteurs_id"=>"1"],["uuid"=>Str::uuid()]);
        $domaine6  = App\Domaine::firstOrCreate(["name"=>"Banque - Assurance"],["secteurs_id"=>"3"],["uuid"=>Str::uuid()]);
        $domaine7  = App\Domaine::firstOrCreate(["name"=>"Bâtiment - Travaux publics"],["secteurs_id"=>"2"],["uuid"=>Str::uuid()]);
        $domaine8  = App\Domaine::firstOrCreate(["name"=>"Bureautique"],["secteurs_id"=>"3"],["uuid"=>Str::uuid()]);
        $domaine9  = App\Domaine::firstOrCreate(["name"=>"Commerce - Vente"],["secteurs_id"=>"3"],["uuid"=>Str::uuid()]);
        $domaine10 = App\Domaine::firstOrCreate(["name"=>"Comptabilité - Finance - Gestion"],["secteurs_id"=>"1"],["uuid"=>Str::uuid()]);
        $domaine11 = App\Domaine::firstOrCreate(["name"=>"Développement personnel"],["secteurs_id"=>"3"],["uuid"=>Str::uuid()]);
        $domaine12 = App\Domaine::firstOrCreate(["name"=>"Droit - Juridique"],["secteurs_id"=>"1"],["uuid"=>Str::uuid()]);
        $domaine13 = App\Domaine::firstOrCreate(["name"=>"Édition - Presse - Médias"],["secteurs_id"=>"1"],["uuid"=>Str::uuid()]);
        $domaine14 = App\Domaine::firstOrCreate(["name"=>"Enseignement - Formation"],["secteurs_id"=>"3"],["uuid"=>Str::uuid()]);
        $domaine15 = App\Domaine::firstOrCreate(["name"=>"Esthétique - Beauté"],["secteurs_id"=>"1"],["uuid"=>Str::uuid()]);
        $domaine16 = App\Domaine::firstOrCreate(["name"=>"Graphisme - PAO CAO DAO"],["secteurs_id"=>"1"],["uuid"=>Str::uuid()]);
        $domaine17 = App\Domaine::firstOrCreate(["name"=>"Immobilier"],["secteurs_id"=>"1"],["uuid"=>Str::uuid()]);
        $domaine18 = App\Domaine::firstOrCreate(["name"=>"Industrie"],["secteurs_id"=>"1"],["uuid"=>Str::uuid()]);
        $domaine19 = App\Domaine::firstOrCreate(["name"=>"Informatique - Réseaux - Télécom"],["secteurs_id"=>"3"],["uuid"=>Str::uuid()]);
        $domaine20 = App\Domaine::firstOrCreate(["name"=>"Internet - Web"],["secteurs_id"=>"1"],["uuid"=>Str::uuid()]);
        $domaine21 = App\Domaine::firstOrCreate(["name"=>"Langues"],["secteurs_id"=>"1"],["uuid"=>Str::uuid()]);
        $domaine22 = App\Domaine::firstOrCreate(["name"=>"Lettres - Sciences humaines et sociales"],["secteurs_id"=>"1"],["uuid"=>Str::uuid()]);
        $domaine23 = App\Domaine::firstOrCreate(["name"=>"Management - Direction d'entreprise"],["secteurs_id"=>"1"],["uuid"=>Str::uuid()]);
        $domaine24 = App\Domaine::firstOrCreate(["name"=>"Marketing - Communication"],["secteurs_id"=>"4"],["uuid"=>Str::uuid()]);
        $domaine25 = App\Domaine::firstOrCreate(["name"=>"Mode - Textile"],["secteurs_id"=>"1"],["uuid"=>Str::uuid()]);
        $domaine26 = App\Domaine::firstOrCreate(["name"=>"Qualité - Sécurité - Environnement"],["secteurs_id"=>"1"],["uuid"=>Str::uuid()]);
        $domaine27 = App\Domaine::firstOrCreate(["name"=>"Ressources humaines"],["secteurs_id"=>"3"],["uuid"=>Str::uuid()]);
        $domaine28 = App\Domaine::firstOrCreate(["name"=>"Santé - Social"],["secteurs_id"=>"3"],["uuid"=>Str::uuid()]);
        $domaine29 = App\Domaine::firstOrCreate(["name"=>"Sciences"],["secteurs_id"=>"3"],["uuid"=>Str::uuid()]);
        $domaine30 = App\Domaine::firstOrCreate(["name"=>"Sport - Loisirs"],["secteurs_id"=>"1"],["uuid"=>Str::uuid()]);
        $domaine31 = App\Domaine::firstOrCreate(["name"=>"Tourisme - Hôtellerie - Restauration"],["secteurs_id"=>"2"],["uuid"=>Str::uuid()]);
        $domaine32 = App\Domaine::firstOrCreate(["name"=>"Transport - Achat - Logistique"],["secteurs_id"=>"3"],["uuid"=>Str::uuid()]);
    }
}
