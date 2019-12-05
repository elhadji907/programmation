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
        $domaine1 =  App\Domaine::firstOrCreate(["name"=>"Accueil - Secrétariat"],["uuid"=>Str::uuid()]);
        $domaine2 =  App\Domaine::firstOrCreate(["name"=>"Agriculture - Agroalimentaire"],["uuid"=>Str::uuid()]);
        $domaine3 =  App\Domaine::firstOrCreate(["name"=>"Architecture - Urbanisme"],["uuid"=>Str::uuid()]);
        $domaine4 =  App\Domaine::firstOrCreate(["name"=>"Artisanat"],["uuid"=>Str::uuid()]);
        $domaine5 =  App\Domaine::firstOrCreate(["name"=>"Arts - Audiovisuel"],["uuid"=>Str::uuid()]);
        $domaine6 =  App\Domaine::firstOrCreate(["name"=>"Banque - Assurance"],["uuid"=>Str::uuid()]);
        $domaine7 =  App\Domaine::firstOrCreate(["name"=>"Bâtiment - Travaux publics"],["uuid"=>Str::uuid()]);
        $domaine8 =  App\Domaine::firstOrCreate(["name"=>"Bureautique"],["uuid"=>Str::uuid()]);
        $domaine9 =  App\Domaine::firstOrCreate(["name"=>"Commerce - Vente"],["uuid"=>Str::uuid()]);
        $domaine10 = App\Domaine::firstOrCreate(["name"=>"Comptabilité - Finance - Gestion"],["uuid"=>Str::uuid()]);
        $domaine11 = App\Domaine::firstOrCreate(["name"=>"Développement personnel"],["uuid"=>Str::uuid()]);
        $domaine12 = App\Domaine::firstOrCreate(["name"=>"Droit - Juridique"],["uuid"=>Str::uuid()]);
        $domaine13 = App\Domaine::firstOrCreate(["name"=>"Édition - Presse - Médias"],["uuid"=>Str::uuid()]);
        $domaine14 = App\Domaine::firstOrCreate(["name"=>"Enseignement - Formation"],["uuid"=>Str::uuid()]);
        $domaine15 = App\Domaine::firstOrCreate(["name"=>"Esthétique - Beauté"],["uuid"=>Str::uuid()]);
        $domaine16 = App\Domaine::firstOrCreate(["name"=>"Graphisme - PAO CAO DAO"],["uuid"=>Str::uuid()]);
        $domaine17 = App\Domaine::firstOrCreate(["name"=>"Immobilier"],["uuid"=>Str::uuid()]);
        $domaine18 = App\Domaine::firstOrCreate(["name"=>"Industrie"],["uuid"=>Str::uuid()]);
        $domaine19 = App\Domaine::firstOrCreate(["name"=>"Informatique - Réseaux - Télécom"],["uuid"=>Str::uuid()]);
        $domaine20 = App\Domaine::firstOrCreate(["name"=>"Internet - Web"],["uuid"=>Str::uuid()]);
        $domaine21 = App\Domaine::firstOrCreate(["name"=>"Langues"],["uuid"=>Str::uuid()]);
        $domaine22 = App\Domaine::firstOrCreate(["name"=>"Lettres - Sciences humaines et sociales"],["uuid"=>Str::uuid()]);
        $domaine23 = App\Domaine::firstOrCreate(["name"=>"Management - Direction d'entreprise"],["uuid"=>Str::uuid()]);
        $domaine24 = App\Domaine::firstOrCreate(["name"=>"Marketing - Communication"],["uuid"=>Str::uuid()]);
        $domaine25 = App\Domaine::firstOrCreate(["name"=>"Mode - Textile"],["uuid"=>Str::uuid()]);
        $domaine26 = App\Domaine::firstOrCreate(["name"=>"Qualité - Sécurité - Environnement"],["uuid"=>Str::uuid()]);
        $domaine27 = App\Domaine::firstOrCreate(["name"=>"Ressources humaines"],["uuid"=>Str::uuid()]);
        $domaine28 = App\Domaine::firstOrCreate(["name"=>"Santé - Social"],["uuid"=>Str::uuid()]);
        $domaine29 = App\Domaine::firstOrCreate(["name"=>"Sciences"],["uuid"=>Str::uuid()]);
        $domaine30 = App\Domaine::firstOrCreate(["name"=>"Sport - Loisirs"],["uuid"=>Str::uuid()]);
        $domaine31 = App\Domaine::firstOrCreate(["name"=>"Tourisme - Hôtellerie - Restauration"],["uuid"=>Str::uuid()]);
        $domaine32 = App\Domaine::firstOrCreate(["name"=>"Transport - Achat - Logistique"],["uuid"=>Str::uuid()]);
    }
}
