<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourriersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'courriers';

    /**
     * Run the migrations.
     * @table courriers
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('numero', 200)->nullable();
            $table->string('objet', 200)->nullable();
            $table->string('expediteur', 200)->nullable();
            $table->string('telephone', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('adresse', 200)->nullable();
            $table->string('fax', 200)->nullable();
            $table->string('bp', 200)->nullable();
            $table->string('type', 200)->nullable();
            $table->string('message', 500)->nullable();
            $table->string('legende', 200)->nullable();
            $table->string('file', 200)->nullable();
            $table->string('statut', 200)->nullable();
            $table->timestamp('date_c')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('date_r')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('types_courriers_id');
            $table->unsignedInteger('users_id');


            $table->index(["types_courriers_id"], 'fk_courriers_types_courriers1_idx');

            $table->index(["users_id"], 'fk_courriers_users1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('types_courriers_id', 'fk_courriers_types_courriers1_idx')
                ->references('id')->on('types_courriers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('users_id', 'fk_courriers_users1_idx')
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
