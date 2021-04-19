<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'divisions';

    /**
     * Run the migrations.
     * @table divisions
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
            $table->string('sigle', 200)->nullable();
            $table->unsignedInteger('directions_id');

            $table->index(["directions_id"], 'fk_divisions_directions1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('directions_id', 'fk_divisions_directions1_idx')
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
