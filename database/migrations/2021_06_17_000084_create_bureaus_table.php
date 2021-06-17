<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBureausTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'bureaus';

    /**
     * Run the migrations.
     * @table bureaus
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
            $table->unsignedInteger('divisions_id');

            $table->index(["divisions_id"], 'fk_bureaus_divisions1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('divisions_id', 'fk_bureaus_divisions1_idx')
                ->references('id')->on('divisions')
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
