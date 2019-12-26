<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiairessecteursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'beneficiairessecteurs';

    /**
     * Run the migrations.
     * @table beneficiairessecteurs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('beneficiaires_id');
            $table->unsignedInteger('secteurs_id');

            $table->index(["secteurs_id"], 'fk_beneficiaires_has_secteurs_secteurs1_idx');

            $table->index(["beneficiaires_id"], 'fk_beneficiaires_has_secteurs_beneficiaires1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('beneficiaires_id', 'fk_beneficiaires_has_secteurs_beneficiaires1_idx')
                ->references('id')->on('beneficiaires')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('secteurs_id', 'fk_beneficiaires_has_secteurs_secteurs1_idx')
                ->references('id')->on('secteurs')
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
