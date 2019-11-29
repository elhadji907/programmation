<?php

use Illuminate\Database\Seeder;

class BeneficiairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Beneficiaire::class,22)->create();
    }
}
