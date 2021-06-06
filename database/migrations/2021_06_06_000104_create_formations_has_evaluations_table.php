<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsHasEvaluationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'formations_has_evaluations';

    /**
     * Run the migrations.
     * @table formations_has_evaluations
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('formations_id');
            $table->unsignedInteger('evaluations_id');

            $table->index(["evaluations_id"], 'fk_formations_has_evaluations_evaluations1_idx');

            $table->index(["formations_id"], 'fk_formations_has_evaluations_formations1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('formations_id', 'fk_formations_has_evaluations_formations1_idx')
                ->references('id')->on('formations')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('evaluations_id', 'fk_formations_has_evaluations_evaluations1_idx')
                ->references('id')->on('evaluations')
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
