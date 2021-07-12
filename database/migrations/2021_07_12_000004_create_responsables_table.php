<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsablesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'responsables';

    /**
     * Run the migrations.
     * @table responsables
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('cin', 200)->nullable();
            $table->string('prenom', 200);
            $table->string('nom', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('telephone', 200)->nullable();
            $table->string('adresse', 200)->nullable();
            $table->string('fonction', 200)->nullable();
            $table->dateTime('date')->nullable();
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
