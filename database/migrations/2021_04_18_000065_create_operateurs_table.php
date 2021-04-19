<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperateursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'operateurs';

    /**
     * Run the migrations.
     * @table operateurs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('numero_agrement', 200)->nullable();
            $table->string('name', 200)->nullable();
            $table->string('sigle', 200)->nullable();
            $table->string('type_structure', 200)->nullable();
            $table->string('ninea', 200)->nullable();
            $table->string('telephone1', 200)->nullable();
            $table->string('telephone2', 200)->nullable();
            $table->string('fixe', 200)->nullable();
            $table->string('email1', 200)->nullable();
            $table->string('email2', 200)->nullable();
            $table->string('adresse', 200)->nullable();
            $table->unsignedInteger('communes_id')->nullable();
            $table->unsignedInteger('users_id')->nullable();

            $table->index(["communes_id"], 'fk_operateurs_communes1_idx');

            $table->index(["users_id"], 'fk_operateurs_users1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('communes_id', 'fk_operateurs_communes1_idx')
                ->references('id')->on('communes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('users_id', 'fk_operateurs_users1_idx')
                ->references('id')->on('users')
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
