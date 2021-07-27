<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngenieursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'ingenieurs';

    /**
     * Run the migrations.
     * @table ingenieurs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('matricule', 200)->nullable();
            $table->string('name', 200);
            $table->string('telephone', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('specialite', 200)->nullable();
            $table->timestamp('date')->nullable();
            $table->string('items1', 200)->nullable();
            $table->string('items2', 200)->nullable();
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
