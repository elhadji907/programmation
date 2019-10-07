<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuartiersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'quartiers';

    /**
     * Run the migrations.
     * @table quartiers
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('nom', 200)->nullable();
            $table->integer('chef_id')->nullable();
            $table->unsignedInteger('villes_id');
            $table->unsignedInteger('villages_id');

            $table->index(["villages_id"], 'fk_quartiers_villages1_idx');

            $table->index(["villes_id"], 'fk_quartiers_villes1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('villes_id', 'fk_quartiers_villes1_idx')
                ->references('id')->on('villes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('villages_id', 'fk_quartiers_villages1_idx')
                ->references('id')->on('villages')
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
