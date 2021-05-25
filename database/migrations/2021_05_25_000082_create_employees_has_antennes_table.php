<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesHasAntennesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employees_has_antennes';

    /**
     * Run the migrations.
     * @table employees_has_antennes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('employees_id');
            $table->unsignedInteger('antennes_id');

            $table->index(["antennes_id"], 'fk_employees_has_antennes_antennes1_idx');

            $table->index(["employees_id"], 'fk_employees_has_antennes_employees1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('employees_id', 'fk_employees_has_antennes_employees1_idx')
                ->references('id')->on('employees')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('antennes_id', 'fk_employees_has_antennes_antennes1_idx')
                ->references('id')->on('antennes')
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
