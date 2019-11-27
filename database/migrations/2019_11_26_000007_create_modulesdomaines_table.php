<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesdomainesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'modulesdomaines';

    /**
     * Run the migrations.
     * @table modulesdomaines
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('modules_id');
            $table->integer('domaines_id');

            $table->index(["modules_id"], 'fk_modulesdomaines_modules1_idx');

            $table->index(["domaines_id"], 'fk_modulesdomaines_domaines1_idx');


            $table->foreign('modules_id', 'fk_modulesdomaines_modules1_idx')
                ->references('id')->on('modules')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('domaines_id', 'fk_modulesdomaines_domaines1_idx')
                ->references('id')->on('domaines')
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
