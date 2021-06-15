<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepensesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'depenses';

    /**
     * Run the migrations.
     * @table depenses
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('numero', 200);
            $table->longText('designation')->nullable();
            $table->longText('fournisseurs')->nullable();
            $table->double('montant')->nullable();
            $table->double('tva')->nullable();
            $table->double('ir')->nullable();
            $table->double('autre_montant')->nullable();
            $table->double('total')->nullable();
            $table->unsignedInteger('activites_id')->nullable();
            $table->unsignedInteger('projets_id')->nullable();

            $table->index(["activites_id"], 'fk_depenses_activites1_idx');

            $table->index(["projets_id"], 'fk_depenses_projets1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('activites_id', 'fk_depenses_activites1_idx')
                ->references('id')->on('activites')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('projets_id', 'fk_depenses_projets1_idx')
                ->references('id')->on('projets')
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
