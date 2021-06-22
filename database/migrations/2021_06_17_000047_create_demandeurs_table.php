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
            $table->string('situation', 200)->nullable();
            $table->string('telephone', 200)->nullable();
            $table->string('fixe', 200)->nullable();
            $table->integer('nbre_piece')->nullable();
            $table->string('items1', 200)->nullable();
            $table->string('items2', 200)->nullable();
            $table->dateTime('date_depot')->nullable();
            $table->timestamp('date1')->nullable();
            $table->timestamp('date2')->nullable();
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('lieux_id')->nullable();
            $table->unsignedInteger('items_id')->nullable();
            $table->unsignedInteger('projets_id')->nullable();
            $table->unsignedInteger('programmes_id')->nullable();
            $table->unsignedInteger('regions_id')->nullable();
            $table->string('file1', 200)->nullable();
            $table->string('file2', 200)->nullable();
            $table->string('file3', 200)->nullable();
            $table->string('file4', 200)->nullable();
            $table->string('file5', 200)->nullable();
            $table->string('file6', 200)->nullable();
            $table->string('file7', 200)->nullable();
            $table->string('file8', 200)->nullable();
            $table->string('file9', 200)->nullable();
            $table->string('file10', 200)->nullable();

            $table->index(["users_id"], 'fk_demandeurs_users1_idx');

            $table->index(["lieux_id"], 'fk_demandeurs_lieux1_idx');

            $table->index(["items_id"], 'fk_demandeurs_items1_idx');

            $table->index(["projets_id"], 'fk_demandeurs_projets1_idx');

            $table->index(["programmes_id"], 'fk_demandeurs_programmes1_idx');

            $table->index(["regions_id"], 'fk_demandeurs_regions1_idx');
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

            $table->foreign('projets_id', 'fk_demandeurs_projets1_idx')
                ->references('id')->on('projets')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('programmes_id', 'fk_demandeurs_programmes1_idx')
                ->references('id')->on('programmes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('regions_id', 'fk_demandeurs_regions1_idx')
                ->references('id')->on('regions')
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