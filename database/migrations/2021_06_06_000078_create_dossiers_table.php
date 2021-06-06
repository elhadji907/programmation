<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDossiersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'dossiers';

    /**
     * Run the migrations.
     * @table dossiers
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
            $table->string('dossier1', 200)->nullable();
            $table->string('dossier2', 200)->nullable();
            $table->string('dossier3', 200)->nullable();
            $table->string('dossier4', 200)->nullable();
            $table->string('dossier5', 200)->nullable();
            $table->string('dossier6', 200)->nullable();
            $table->string('dossier7', 200)->nullable();
            $table->string('dossier8', 200)->nullable();
            $table->string('dossier9', 200)->nullable();
            $table->string('dossier10', 200)->nullable();
            $table->string('dossier11', 200)->nullable();
            $table->string('dossier12', 200)->nullable();
            $table->string('dossier13', 200)->nullable();
            $table->string('dossier14', 200)->nullable();
            $table->string('dossier15', 200)->nullable();
            $table->unsignedInteger('employees_id');

            $table->index(["employees_id"], 'fk_dossiers_employees1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('employees_id', 'fk_dossiers_employees1_idx')
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
