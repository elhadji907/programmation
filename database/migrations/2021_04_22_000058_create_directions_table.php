<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'directions';

    /**
     * Run the migrations.
     * @table directions
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('name', 200)->nullable();
            $table->string('sigle', 200)->nullable();
            $table->unsignedInteger('types_directions_id')->nullable();
            $table->unsignedInteger('imputations_id')->nullable();
            $table->unsignedInteger('courriers_id')->nullable();

            $table->index(["types_directions_id"], 'fk_directions_types_directions1_idx');

            $table->index(["imputations_id"], 'fk_directions_imputations1_idx');

            $table->index(["courriers_id"], 'fk_directions_courriers1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('types_directions_id', 'fk_directions_types_directions1_idx')
                ->references('id')->on('types_directions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('imputations_id', 'fk_directions_imputations1_idx')
                ->references('id')->on('imputations')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('courriers_id', 'fk_directions_courriers1_idx')
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
