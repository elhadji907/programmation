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
            $table->string('numero_courrier', 200);
            $table->string('numero', 200)->nullable();
            $table->string('cin', 200);
            $table->string('experience', 200)->nullable();
            $table->string('projet', 200)->nullable();
            $table->string('information', 200)->nullable();
            $table->timestamp('date_depot')->nullable()->default(null);
            $table->string('status', 45)->nullable();
            $table->double('note')->nullable();
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('typedemandes_id');
            $table->unsignedInteger('objets_id');
            $table->unsignedInteger('localites_id');

            $table->index(["users_id"], 'fk_demandeurs_users1_idx');

            $table->index(["typedemandes_id"], 'fk_demandeurs_typedemandes1_idx');

            $table->index(["objets_id"], 'fk_demandeurs_objets1_idx');

            $table->index(["localites_id"], 'fk_demandeurs_localites1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_demandeurs_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('typedemandes_id', 'fk_demandeurs_typedemandes1_idx')
                ->references('id')->on('typedemandes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('objets_id', 'fk_demandeurs_objets1_idx')
                ->references('id')->on('objets')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('localites_id', 'fk_demandeurs_localites1_idx')
                ->references('id')->on('localites')
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
