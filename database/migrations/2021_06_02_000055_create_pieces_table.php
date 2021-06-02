<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiecesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'pieces';

    /**
     * Run the migrations.
     * @table pieces
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
            $table->string('piece1', 200)->nullable();
            $table->string('piece2', 200)->nullable();
            $table->string('piece3', 200)->nullable();
            $table->string('piece4', 200)->nullable();
            $table->string('piece5', 200)->nullable();
            $table->string('piece6', 200)->nullable();
            $table->string('piece7', 200)->nullable();
            $table->string('piece8', 200)->nullable();
            $table->string('piece9', 200)->nullable();
            $table->string('piece10', 200)->nullable();
            $table->string('piece11', 200)->nullable();
            $table->string('piece12', 200)->nullable();
            $table->string('piece13', 200)->nullable();
            $table->string('piece14', 200)->nullable();
            $table->string('piece15', 200)->nullable();
            $table->unsignedInteger('demandeurs_id');

            $table->index(["demandeurs_id"], 'fk_pieces_demandeurs1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('demandeurs_id', 'fk_pieces_demandeurs1_idx')
                ->references('id')->on('demandeurs')
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
