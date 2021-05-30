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
            $table->string('numero', 200)->nullable();
            $table->string('sexe', 45)->nullable();
            $table->string('situation_professionnelle', 200)->nullable();
            $table->string('etablissement', 200)->nullable();
            $table->string('niveau_etude', 200)->nullable();
            $table->string('diplome', 200)->nullable();
            $table->longText('qualification')->nullable();
            $table->longText('experience')->nullable();
            $table->string('deja_forme', 200)->nullable();
            $table->longText('pre_requis')->nullable();
            $table->longText('adresse')->nullable();
            $table->string('type', 200)->nullable();
            $table->longText('projet')->nullable();
            $table->string('situation', 200)->nullable();
            $table->string('telephone', 200)->nullable();
            $table->string('fixe', 200)->nullable();
            $table->integer('nbre_piece')->nullable();
            $table->string('items1', 200)->nullable();
            $table->string('items2', 200)->nullable();
            $table->timestamp('date1')->nullable();
            $table->timestamp('date2')->nullable();
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('lieux_id')->nullable();
            $table->unsignedInteger('items_id')->nullable();

            $table->index(["users_id"], 'fk_demandeurs_users1_idx');

            $table->index(["lieux_id"], 'fk_demandeurs_lieux1_idx');

            $table->index(["items_id"], 'fk_demandeurs_items1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_demandeurs_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('lieux_id', 'fk_demandeurs_lieux1_idx')
                ->references('id')->on('lieuxs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('items_id', 'fk_demandeurs_items1_idx')
                ->references('id')->on('items')
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
