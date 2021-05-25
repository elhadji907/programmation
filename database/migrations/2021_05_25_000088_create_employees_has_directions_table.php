<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesHasDirectionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employees_has_directions';

    /**
     * Run the migrations.
     * @table employees_has_directions
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('employees_id');
            $table->unsignedInteger('directions_id');

            $table->index(["directions_id"], 'fk_employees_has_directions_directions1_idx');

            $table->index(["employees_id"], 'fk_employees_has_directions_employees1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('employees_id', 'fk_employees_has_directions_employees1_idx')
                ->references('id')->on('employees')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('directions_id', 'fk_employees_has_directions_directions1_idx')
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
