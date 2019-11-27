<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiairesformationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'beneficiairesformations';

    /**
     * Run the migrations.
     * @table beneficiairesformations
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('beneficiaires_id');
            $table->integer('formations_id');

            $table->index(["formations_id"], 'fk_beneficiairesformations_formations1_idx');

            $table->index(["beneficiaires_id"], 'fk_beneficiairesformations_beneficiaires1_idx');


            $table->foreign('beneficiaires_id', 'fk_beneficiairesformations_beneficiaires1_idx')
                ->references('id')->on('beneficiaires')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('formations_id', 'fk_beneficiairesformations_formations1_idx')
                ->references('id')->on('formations')
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
