<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectivesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'collectives';

    /**
     * Run the migrations.
     * @table collectives
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('cin', 200);
            $table->string('name', 200);
            $table->string('items1', 200)->nullable();
            $table->timestamp('date1')->nullable();
            $table->unsignedInteger('demandeurs_id');
            $table->string('sigle', 100)->nullable();
            $table->string('statut', 100)->nullable();
            $table->longText('description')->nullable();

            $table->index(["demandeurs_id"], 'fk_collectives_demandeurs1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('demandeurs_id', 'fk_collectives_demandeurs1_idx')
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
