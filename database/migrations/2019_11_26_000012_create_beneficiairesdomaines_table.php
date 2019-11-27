<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiairesdomainesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'beneficiairesdomaines';

    /**
     * Run the migrations.
     * @table beneficiairesdomaines
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('beneficiaires_id');
            $table->integer('domaines_id');

            $table->index(["domaines_id"], 'fk_beneficiairesdomaines_domaines1_idx');

            $table->index(["beneficiaires_id"], 'fk_beneficiairesdomaines_beneficiaires1_idx');


            $table->foreign('beneficiaires_id', 'fk_beneficiairesdomaines_beneficiaires1_idx')
                ->references('id')->on('beneficiaires')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('domaines_id', 'fk_beneficiairesdomaines_domaines1_idx')
                ->references('id')->on('domaines')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
