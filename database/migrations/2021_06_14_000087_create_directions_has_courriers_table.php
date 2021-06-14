<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectionsHasCourriersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'directions_has_courriers';

    /**
     * Run the migrations.
     * @table directions_has_courriers
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('directions_id');
            $table->unsignedInteger('courriers_id');

            $table->index(["courriers_id"], 'fk_directions_has_courriers_courriers1_idx');

            $table->index(["directions_id"], 'fk_directions_has_courriers_directions1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('directions_id', 'fk_directions_has_courriers_directions1_idx')
                ->references('id')->on('directions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('courriers_id', 'fk_directions_has_courriers_courriers1_idx')
                ->references('id')->on('courriers')
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
