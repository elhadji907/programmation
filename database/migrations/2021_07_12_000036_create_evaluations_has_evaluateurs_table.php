<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsHasEvaluateursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'evaluations_has_evaluateurs';

    /**
     * Run the migrations.
     * @table evaluations_has_evaluateurs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('evaluations_id');
            $table->unsignedInteger('evaluateurs_id');

            $table->index(["evaluateurs_id"], 'fk_evaluations_has_evaluateurs_evaluateurs1_idx');

            $table->index(["evaluations_id"], 'fk_evaluations_has_evaluateurs_evaluations1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('evaluations_id', 'fk_evaluations_has_evaluateurs_evaluations1_idx')
                ->references('id')->on('evaluations')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('evaluateurs_id', 'fk_evaluations_has_evaluateurs_evaluateurs1_idx')
                ->references('id')->on('evaluateurs')
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
