<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'evaluations';

    /**
     * Run the migrations.
     * @table evaluations
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('note', 200);
            $table->unsignedInteger('formes_id');
            $table->unsignedInteger('certifications_id');

            $table->index(["certifications_id"], 'fk_evaluations_certifications1_idx');

            $table->index(["formes_id"], 'fk_evaluations_formes1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('formes_id', 'fk_evaluations_formes1_idx')
                ->references('id')->on('formes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('certifications_id', 'fk_evaluations_certifications1_idx')
                ->references('id')->on('certifications')
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
