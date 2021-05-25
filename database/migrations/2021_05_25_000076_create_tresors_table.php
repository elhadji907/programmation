<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTresorsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tresors';

    /**
     * Run the migrations.
     * @table tresors
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('numero', 200)->nullable();
            $table->dateTime('date_recep')->nullable();
            $table->longText('designation')->nullable();
            $table->longText('observation')->nullable();
            $table->double('montant')->nullable();
            $table->dateTime('date_depart')->nullable();
            $table->dateTime('date_retour')->nullable();
            $table->dateTime('date_transmission')->nullable();
            $table->dateTime('date_dg')->nullable();
            $table->dateTime('date_cg')->nullable();
            $table->dateTime('date_ac')->nullable();
            $table->unsignedInteger('courriers_id');

            $table->index(["courriers_id"], 'fk_tresors_courriers1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('courriers_id', 'fk_tresors_courriers1_idx')
                ->references('id')->on('courriers')
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
