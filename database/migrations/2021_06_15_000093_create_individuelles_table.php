<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividuellesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'individuelles';

    /**
     * Run the migrations.
     * @table individuelles
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
            $table->integer('nbre_pieces')->nullable();
            $table->longText('legende')->nullable();
            $table->longText('reference')->nullable();
            $table->longText('experience')->nullable();
            $table->longText('projet')->nullable();
            $table->longText('prerequis')->nullable();
            $table->longText('information')->nullable();
            $table->string('items1', 200)->nullable();
            $table->timestamp('date1')->nullable();
            $table->unsignedInteger('demandeurs_id');

            $table->index(["demandeurs_id"], 'fk_individuelles_demandeurs1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('demandeurs_id', 'fk_individuelles_demandeurs1_idx')
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
