<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEcolesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'ecoles';

    /**
     * Run the migrations.
     * @table ecoles
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
            $table->string('items1', 200)->nullable();
            $table->timestamp('date1')->nullable();
            $table->string('sigle', 45)->nullable();
            $table->string('telephone1', 200)->nullable();
            $table->string('telephone2', 200)->nullable();
            $table->string('fixe', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('adresse', 200)->nullable();
            $table->unsignedInteger('regions_id')->nullable();

            $table->index(["regions_id"], 'fk_ecoles_regions1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('regions_id', 'fk_ecoles_regions1_idx')
                ->references('id')->on('regions')
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
