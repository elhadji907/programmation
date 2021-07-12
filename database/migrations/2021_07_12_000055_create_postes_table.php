<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'postes';

    /**
     * Run the migrations.
     * @table postes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('legende', 200)->nullable();
            $table->string('image', 200)->nullable();
            $table->unsignedInteger('users_id');

            $table->index(["users_id"], 'fk_postes_users1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_postes_users1_idx')
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
