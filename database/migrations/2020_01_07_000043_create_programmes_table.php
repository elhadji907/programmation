<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'programmes';

    /**
     * Run the migrations.
     * @table programmes
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
            $table->timestamp('debut')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fin')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('effectif')->nullable();
            $table->unsignedInteger('courriers_id');

            $table->index(["courriers_id"], 'fk_programmes_courriers1_idx');


            $table->foreign('courriers_id', 'fk_programmes_courriers1_idx')
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
