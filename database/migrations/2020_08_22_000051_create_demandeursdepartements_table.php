<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandeursdepartementsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'demandeursdepartements';

    /**
     * Run the migrations.
     * @table demandeursdepartements
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('demandeurs_id');
            $table->unsignedInteger('departements_id');

            $table->index(["departements_id"], 'fk_demandeursdepartements_departements1_idx');

            $table->index(["demandeurs_id"], 'fk_demandeursdepartements_demandeurs1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('demandeurs_id', 'fk_demandeursdepartements_demandeurs1_idx')
                ->references('id')->on('demandeurs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('departements_id', 'fk_demandeursdepartements_departements1_idx')
                ->references('id')->on('departements')
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
