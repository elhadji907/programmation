<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdresMissionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'ordres_missions';

    /**
     * Run the migrations.
     * @table ordres_missions
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
            $table->string('beneficiaire', 200)->nullable();
            $table->double('montant')->nullable();
            $table->dateTime('date_depart')->nullable();
            $table->dateTime('date_retour')->nullable();
            $table->dateTime('date_transmission')->nullable();
            $table->dateTime('date_dag')->nullable();
            $table->dateTime('date_ac')->nullable();
            $table->unsignedInteger('dafs_id')->nullable();
            $table->unsignedInteger('employees_id')->nullable();

            $table->index(["dafs_id"], 'fk_ordres_missions_dafs1_idx');

            $table->index(["employees_id"], 'fk_ordres_missions_employees1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('dafs_id', 'fk_ordres_missions_dafs1_idx')
                ->references('id')->on('dafs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('employees_id', 'fk_ordres_missions_employees1_idx')
                ->references('id')->on('employees')
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
