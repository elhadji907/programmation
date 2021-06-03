<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employees';

    /**
     * Run the migrations.
     * @table employees
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('matricule', 200);
            $table->string('adresse', 200)->nullable();
            $table->string('cin', 20);
            $table->dateTime('date_embauche')->nullable();
            $table->string('classification', 200)->nullable();
            $table->string('categorie_salaire', 200)->nullable();
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('categories_id')->nullable();
            $table->unsignedInteger('fonctions_id')->nullable();
            $table->unsignedInteger('directions_id')->nullable();

            $table->index(["users_id"], 'fk_employees_users1_idx');

            $table->index(["categories_id"], 'fk_employees_categories1_idx');

            $table->index(["fonctions_id"], 'fk_employees_fonctions1_idx');

            $table->index(["directions_id"], 'fk_employees_directions1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_employees_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('categories_id', 'fk_employees_categories1_idx')
                ->references('id')->on('categories')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fonctions_id', 'fk_employees_fonctions1_idx')
                ->references('id')->on('fonctions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('directions_id', 'fk_employees_directions1_idx')
                ->references('id')->on('directions')
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
