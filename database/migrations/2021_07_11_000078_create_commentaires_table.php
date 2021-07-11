<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentairesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'commentaires';

    /**
     * Run the migrations.
     * @table commentaires
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
            $table->unsignedInteger('demandeurs_id');

            $table->index(["users_id"], 'fk_commentaires_users1_idx');

            $table->index(["demandeurs_id"], 'fk_commentaires_demandeurs1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_commentaires_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('demandeurs_id', 'fk_commentaires_demandeurs1_idx')
                ->references('id')->on('demandeurs')
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
