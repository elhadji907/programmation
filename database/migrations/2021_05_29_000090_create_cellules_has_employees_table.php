<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCellulesHasEmployeesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'cellules_has_employees';

    /**
     * Run the migrations.
     * @table cellules_has_employees
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('cellules_id');
            $table->unsignedInteger('employees_id');

            $table->index(["employees_id"], 'fk_cellules_has_employees_employees1_idx');

            $table->index(["cellules_id"], 'fk_cellules_has_employees_cellules1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('cellules_id', 'fk_cellules_has_employees_cellules1_idx')
                ->references('id')->on('cellules')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('employees_id', 'fk_cellules_has_employees_employees1_idx')
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
