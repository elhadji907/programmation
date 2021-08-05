<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamillesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'familles';

    /**
     * Run the migrations.
     * @table familles
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('civilite', 45)->nullable();
            $table->string('prenom', 200);
            $table->string('nom', 200)->nullable();
            $table->dateTime('date')->nullable();
            $table->string('lieu', 200)->nullable();
            $table->string('status', 200)->nullable();
            $table->string('adresse', 200)->nullable();
            $table->string('telephone', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->unsignedInteger('employees_id');
            $table->string('employees_matricule', 200)->nullable();

            $table->index(["employees_id", "employees_matricule"], 'fk_familles_employees1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('employees_id', 'fk_familles_employees1_idx')
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
