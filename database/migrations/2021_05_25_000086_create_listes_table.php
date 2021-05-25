<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'listes';

    /**
     * Run the migrations.
     * @table listes
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
            $table->unsignedInteger('bordereaus_id')->nullable();

            $table->index(["bordereaus_id"], 'fk_listes_bordereaus1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('bordereaus_id', 'fk_listes_bordereaus1_idx')
                ->references('id')->on('bordereaus')
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
