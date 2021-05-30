<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourriersHasImputationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'courriers_has_imputations';

    /**
     * Run the migrations.
     * @table courriers_has_imputations
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('courriers_id');
            $table->unsignedInteger('imputations_id');

            $table->index(["imputations_id"], 'fk_courriers_has_imputations_imputations1_idx');

            $table->index(["courriers_id"], 'fk_courriers_has_imputations_courriers1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('courriers_id', 'fk_courriers_has_imputations_courriers1_idx')
                ->references('id')->on('courriers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('imputations_id', 'fk_courriers_has_imputations_imputations1_idx')
                ->references('id')->on('imputations')
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
