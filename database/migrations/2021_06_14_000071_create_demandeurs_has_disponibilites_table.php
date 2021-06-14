<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandeursHasDisponibilitesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'demandeurs_has_disponibilites';

    /**
     * Run the migrations.
     * @table demandeurs_has_disponibilites
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('demandeurs_id');
            $table->unsignedInteger('disponibilites_id');

            $table->index(["disponibilites_id"], 'fk_demandeurs_has_disponibilites_disponibilites1_idx');

            $table->index(["demandeurs_id"], 'fk_demandeurs_has_disponibilites_demandeurs1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('demandeurs_id', 'fk_demandeurs_has_disponibilites_demandeurs1_idx')
                ->references('id')->on('demandeurs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('disponibilites_id', 'fk_demandeurs_has_disponibilites_disponibilites1_idx')
                ->references('id')->on('disponibilites')
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
