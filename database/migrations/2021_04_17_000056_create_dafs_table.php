<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDafsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'dafs';

    /**
     * Run the migrations.
     * @table dafs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('name', 200)->nullable();
            $table->dateTime('date_visa')->nullable();
            $table->dateTime('date_mandat')->nullable();
            $table->dateTime('date_ac')->nullable();
            $table->string('tva_ir', 200)->nullable();
            $table->longText('rejet')->nullable();
            $table->dateTime('date_cg')->nullable();
            $table->string('retour', 200)->nullable();
            $table->string('paye', 200)->nullable();
            $table->longText('observation')->nullable();
            $table->string('nb_pc', 45)->nullable();
            $table->string('destinataire', 200)->nullable();
            $table->dateTime('date_paye')->nullable();
            $table->string('num_bord', 200)->nullable();
            $table->unsignedInteger('courriers_id')->nullable();
            $table->unsignedInteger('projets_id')->nullable();

            $table->index(["courriers_id"], 'fk_dafs_courriers1_idx');

            $table->index(["projets_id"], 'fk_dafs_projets1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('courriers_id', 'fk_dafs_courriers1_idx')
                ->references('id')->on('courriers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('projets_id', 'fk_dafs_projets1_idx')
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
