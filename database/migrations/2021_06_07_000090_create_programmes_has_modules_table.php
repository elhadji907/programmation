<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammesHasModulesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'programmes_has_modules';

    /**
     * Run the migrations.
     * @table programmes_has_modules
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('programmes_id');
            $table->unsignedInteger('modules_id');

            $table->index(["modules_id"], 'fk_programmes_has_modules_modules1_idx');

            $table->index(["programmes_id"], 'fk_programmes_has_modules_programmes1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('programmes_id', 'fk_programmes_has_modules_programmes1_idx')
                ->references('id')->on('programmes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('modules_id', 'fk_programmes_has_modules_modules1_idx')
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
