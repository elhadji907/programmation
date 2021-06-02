<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'missions';

    /**
     * Run the migrations.
     * @table missions
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
            $table->string('localites', 200)->nullable();
            $table->unsignedInteger('distance')->nullable();
            $table->unsignedInteger('jours')->nullable();
            $table->dateTime('date_visa')->nullable();
            $table->dateTime('date_mandat')->nullable();
            $table->dateTime('date_ac')->nullable();
            $table->string('tva_ir', 200)->nullable();
            $table->longText('rejet')->nullable();
            $table->dateTime('date_cg')->nullable();
            $table->string('retour', 200)->nullable();
            $table->string('paye', 200)->nullable();
            $table->dateTime('date_paye')->nullable();
            $table->dateTime('date_depart')->nullable();
            $table->dateTime('date_retour')->nullable();
            $table->string('destination', 200)->nullable();
            $table->double('montant')->nullable();
            $table->double('reliquat')->nullable();
            $table->double('accompt')->nullable();
            $table->unsignedInteger('employees_id')->nullable();
            $table->unsignedInteger('vehicules_id')->nullable();
            $table->unsignedInteger('courriers_id');

            $table->index(["employees_id"], 'fk_missions_employees1_idx');

            $table->index(["vehicules_id"], 'fk_missions_vehicules1_idx');

            $table->index(["courriers_id"], 'fk_missions_courriers1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('employees_id', 'fk_missions_employees1_idx')
                ->references('id')->on('employees')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('vehicules_id', 'fk_missions_vehicules1_idx')
                ->references('id')->on('vehicules')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('courriers_id', 'fk_missions_courriers1_idx')
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
