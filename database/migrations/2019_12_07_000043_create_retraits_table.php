<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetraitsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'retraits';

    /**
     * Run the migrations.
     * @table retraits
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
            $table->string('firstname', 200)->nullable();
            $table->string('lastname', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('telephone', 200)->nullable();
            $table->timestamp('date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('evaluations_id');

            $table->index(["evaluations_id"], 'fk_retraits_evaluations1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('evaluations_id', 'fk_retraits_evaluations1_idx')
                ->references('id')->on('evaluations')
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
