<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'domaines';

    /**
     * Run the migrations.
     * @table domaines
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
            $table->longText('description')->nullable();
            $table->unsignedInteger('secteurs_id')->nullable();

            $table->index(["secteurs_id"], 'fk_domaines_secteurs1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('secteurs_id', 'fk_domaines_secteurs1_idx')
                ->references('id')->on('secteurs')
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
