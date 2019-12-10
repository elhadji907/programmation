<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandeursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'demandeurs';

    /**
     * Run the migrations.
     * @table demandeurs
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
            $table->string('cin', 200)->nullable();
            $table->string('status', 45)->nullable();
            $table->unsignedInteger('courriers_id');
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('typedemandes_id');

            $table->index(["users_id"], 'fk_demandeurs_users1_idx');

            $table->index(["typedemandes_id"], 'fk_demandeurs_typedemandes1_idx');

            $table->index(["courriers_id"], 'fk_demandeformations_courriers1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('courriers_id', 'fk_demandeformations_courriers1_idx')
                ->references('id')->on('courriers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('users_id', 'fk_demandeurs_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('typedemandes_id', 'fk_demandeurs_typedemandes1_idx')
                ->references('id')->on('typedemandes')
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
