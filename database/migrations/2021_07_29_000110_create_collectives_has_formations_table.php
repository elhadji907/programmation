<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectivesHasFormationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'collectives_has_formations';

    /**
     * Run the migrations.
     * @table collectives_has_formations
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('collectives_id');
            $table->unsignedInteger('formations_id');

            $table->index(["formations_id"], 'fk_collectives_has_formations_formations1_idx');

            $table->index(["collectives_id"], 'fk_collectives_has_formations_collectives1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('collectives_id', 'fk_collectives_has_formations_collectives1_idx')
                ->references('id')->on('collectives')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('formations_id', 'fk_collectives_has_formations_formations1_idx')
                ->references('id')->on('formations')
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
