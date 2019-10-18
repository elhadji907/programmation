<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('civilite', 200)->nullable();
            $table->string('firstname', 200)->nullable();
            $table->string('name', 200)->nullable();
            $table->string('username', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('telephone', 200)->nullable();
            $table->dateTime('date_naissance')->nullable();
            $table->string('lieu_naissance', 200)->nullable();
            $table->string('situation_familiale', 200)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->unsignedInteger('roles_id');
            $table->unsignedInteger('directions_id');

            $table->index(["directions_id"], 'fk_users_directions1_idx');

            $table->index(["roles_id"], 'fk_users_roles1_idx');

            $table->unique(["email"], 'email_UNIQUE');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('roles_id', 'fk_users_roles1_idx')
                ->references('id')->on('roles')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('directions_id', 'fk_users_directions1_idx')
                ->references('id')->on('directions')
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
