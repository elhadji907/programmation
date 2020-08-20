<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammeslocalitesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'programmeslocalites';

    /**
     * Run the migrations.
     * @table programmeslocalites
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('programmes_id');
            $table->unsignedInteger('localites_id');

            $table->index(["localites_id"], 'fk_programmeslocalites_localites1_idx');

            $table->index(["programmes_id"], 'fk_programmeslocalites_programmes1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('programmes_id', 'fk_programmeslocalites_programmes1_idx')
                ->references('id')->on('programmes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('localites_id', 'fk_programmeslocalites_localites1_idx')
                ->references('id')->on('localites')
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
