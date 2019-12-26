<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsevaluateursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'formationsevaluateurs';

    /**
     * Run the migrations.
     * @table formationsevaluateurs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('formations_id');
            $table->unsignedInteger('evaluateurs_id');

            $table->index(["formations_id"], 'fk_formations_has_evaluateurs_formations1_idx');

            $table->index(["evaluateurs_id"], 'fk_formations_has_evaluateurs_evaluateurs1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('formations_id', 'fk_formations_has_evaluateurs_formations1_idx')
                ->references('id')->on('formations')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('evaluateurs_id', 'fk_formations_has_evaluateurs_evaluateurs1_idx')
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
