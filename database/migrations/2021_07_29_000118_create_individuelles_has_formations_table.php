<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividuellesHasFormationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'individuelles_has_formations';

    /**
     * Run the migrations.
     * @table individuelles_has_formations
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('individuelles_id');
            $table->unsignedInteger('formations_id');

            $table->index(["formations_id"], 'fk_individuelles_has_formations_formations1_idx');

            $table->index(["individuelles_id"], 'fk_individuelles_has_formations_individuelles1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('individuelles_id', 'fk_individuelles_has_formations_individuelles1_idx')
                ->references('id')->on('individuelles')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('formations_id', 'fk_individuelles_has_formations_formations1_idx')
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
