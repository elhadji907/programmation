<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiplomesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'diplomes';

    /**
     * Run the migrations.
     * @table diplomes
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
            $table->string('sigle', 50)->nullable();
            $table->string('titre1', 200)->nullable();
            $table->timestamp('date1')->nullable();
            $table->unsignedInteger('options_id')->nullable();

            $table->index(["options_id"], 'fk_diplomes_options1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('options_id', 'fk_diplomes_options1_idx')
                ->references('id')->on('options')
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
