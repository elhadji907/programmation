<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgrementsTypesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'agrements_types';

    /**
     * Run the migrations.
     * @table agrements_types
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('name', 200);
            $table->unsignedInteger('agrements_id');

            $table->index(["agrements_id"], 'fk_agrements_types_agrements1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('agrements_id', 'fk_agrements_types_agrements1_idx')
                ->references('id')->on('agrements')
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
