<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatutsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'statuts';

    /**
     * Run the migrations.
     * @table statuts
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
            $table->string('niveau', 200)->nullable();
            $table->string('details', 200)->nullable();
            $table->dateTime('date1')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('date2')->nullable();
            $table->dateTime('date3')->nullable();
            $table->dateTime('date5')->nullable();
            $table->dateTime('date6')->nullable();
            $table->dateTime('date7')->nullable();
            $table->dateTime('date8')->nullable();
            $table->dateTime('date9')->nullable();
            $table->dateTime('date10')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
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
