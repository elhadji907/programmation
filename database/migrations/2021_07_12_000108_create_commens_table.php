<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommensTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'commens';

    /**
     * Run the migrations.
     * @table commens
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->longText('content')->nullable();
            $table->integer('commentable_id')->nullable();
            $table->longText('commentable_type')->nullable();
            $table->timestamp('cread_at')->nullable();
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('formations_id');

            $table->index(["users_id"], 'fk_commens_users1_idx');

            $table->index(["formations_id"], 'fk_commens_formations1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_commens_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('formations_id', 'fk_commens_formations1_idx')
                ->references('id')->on('formations')
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
