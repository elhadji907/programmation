<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourriersHasDirectionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'courriers_has_directions';

    /**
     * Run the migrations.
     * @table courriers_has_directions
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->char('uuid', 36);
            $table->increments('courriers_id');
            $table->unsignedInteger('directions_id');

            $table->index(["courriers_id"], 'fk_courriers_has_directions_courriers1_idx');

            $table->index(["directions_id"], 'fk_courriers_has_directions_directions1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('courriers_id', 'fk_courriers_has_directions_courriers1_idx')
                ->references('id')->on('courriers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('directions_id', 'fk_courriers_has_directions_directions1_idx')
                ->references('id')->on('directions')
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
