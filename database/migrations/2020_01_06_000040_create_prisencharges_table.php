<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrisenchargesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'prisencharges';

    /**
     * Run the migrations.
     * @table prisencharges
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('structure', 200)->nullable();
            $table->double('montant')->nullable();
            $table->dateTime('date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('familles_id');

            $table->index(["familles_id"], 'fk_prisencharges_familles1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('familles_id', 'fk_prisencharges_familles1_idx')
                ->references('id')->on('familles')
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
