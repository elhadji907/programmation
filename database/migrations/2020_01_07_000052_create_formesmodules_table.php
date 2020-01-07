<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormesmodulesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'formesmodules';

    /**
     * Run the migrations.
     * @table formesmodules
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('formes_id');
            $table->unsignedInteger('modules_id');

            $table->index(["formes_id"], 'fk_formes_has_modules_formes1_idx');

            $table->index(["modules_id"], 'fk_formes_has_modules_modules1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('formes_id', 'fk_formes_has_modules_formes1_idx')
                ->references('id')->on('formes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('modules_id', 'fk_formes_has_modules_modules1_idx')
                ->references('id')->on('modules')
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
