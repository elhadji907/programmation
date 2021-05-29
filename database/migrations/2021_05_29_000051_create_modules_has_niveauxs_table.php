<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesHasNiveauxsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'modules_has_niveauxs';

    /**
     * Run the migrations.
     * @table modules_has_niveauxs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('modules_id');
            $table->unsignedInteger('niveauxs_id');

            $table->index(["niveauxs_id"], 'fk_modules_has_niveauxs_niveauxs1_idx');

            $table->index(["modules_id"], 'fk_modules_has_niveauxs_modules1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('modules_id', 'fk_modules_has_niveauxs_modules1_idx')
                ->references('id')->on('modules')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('niveauxs_id', 'fk_modules_has_niveauxs_niveauxs1_idx')
                ->references('id')->on('niveauxs')
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
