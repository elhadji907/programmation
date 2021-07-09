<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembresTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'membres';

    /**
     * Run the migrations.
     * @table membres
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('name', 200);
            $table->string('firtname', 200)->nullable();
            $table->string('cin', 200)->nullable();
            $table->dateTime('date_naissance')->nullable();
            $table->string('lieu_naissance', 200)->nullable();
            $table->string('niveaux', 200)->nullable();
            $table->longText('experience_domaine')->nullable();
            $table->longText('autre_experience')->nullable();
            $table->string('titre1', 200)->nullable();
            $table->timestamp('date1')->nullable();
            $table->unsignedInteger('collectives_id');

            $table->index(["collectives_id"], 'fk_membres_collectives1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('collectives_id', 'fk_membres_collectives1_idx')
                ->references('id')->on('collectives')
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
