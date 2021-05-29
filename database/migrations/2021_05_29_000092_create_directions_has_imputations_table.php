<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectionsHasImputationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'directions_has_imputations';

    /**
     * Run the migrations.
     * @table directions_has_imputations
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('directions_id');
            $table->unsignedInteger('imputations_id');

            $table->index(["imputations_id"], 'fk_directions_has_imputations_imputations1_idx');

            $table->index(["directions_id"], 'fk_directions_has_imputations_directions1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('directions_id', 'fk_directions_has_imputations_directions1_idx')
                ->references('id')->on('directions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('imputations_id', 'fk_directions_has_imputations_imputations1_idx')
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
