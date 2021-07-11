<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'modules';

    /**
     * Run the migrations.
     * @table modules
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
            $table->string('sigle', 45)->nullable();
            $table->longText('description')->nullable();
            $table->string('qualification', 200)->nullable();
            $table->unsignedInteger('domaines_id')->nullable();
            $table->unsignedInteger('specialites_id')->nullable();
            $table->unsignedInteger('statuts_id')->nullable();

            $table->index(["domaines_id"], 'fk_modules_domaines1_idx');

            $table->index(["specialites_id"], 'fk_modules_specialites1_idx');

            $table->index(["statuts_id"], 'fk_modules_statuts1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('domaines_id', 'fk_modules_domaines1_idx')
                ->references('id')->on('domaines')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('specialites_id', 'fk_modules_specialites1_idx')
                ->references('id')->on('specialites')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('statuts_id', 'fk_modules_statuts1_idx')
                ->references('id')->on('statuts')
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
