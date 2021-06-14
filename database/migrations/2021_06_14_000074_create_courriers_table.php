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
            $table->string('numero', 200);
            $table->longText('objet')->nullable();
            $table->string('expediteur', 200)->nullable();
            $table->string('name', 200)->nullable();
            $table->string('type', 200)->nullable();
            $table->longText('description')->nullable();
            $table->longText('message')->nullable();
            $table->string('email', 200)->nullable();
            $table->string('fax', 200)->nullable();
            $table->string('bp', 200)->nullable();
            $table->string('telephone', 200)->nullable();
            $table->string('file', 200)->nullable();
            $table->string('legende', 200)->nullable();
            $table->string('statut', 200)->nullable();
            $table->timestamp('date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('adresse', 200)->nullable();
            $table->dateTime('date_imp')->nullable();
            $table->dateTime('date_recep')->nullable();
            $table->dateTime('date_cores')->nullable();
            $table->dateTime('date_rejet')->nullable();
            $table->dateTime('date_liq')->nullable();
            $table->longText('designation')->nullable();
            $table->longText('observation')->nullable();
            $table->dateTime('date_visa')->nullable();
            $table->dateTime('date_mandat')->nullable();
            $table->double('tva')->nullable();
            $table->double('ir')->nullable();
            $table->string('nb_pc', 45)->nullable();
            $table->string('destinataire', 200)->nullable();
            $table->dateTime('date_paye')->nullable();
            $table->integer('num_bord')->nullable();
            $table->double('montant')->nullable();
            $table->double('autres_montant')->nullable();
            $table->double('total')->nullable();
            $table->unsignedInteger('users_id')->nullable();
            $table->unsignedInteger('types_courriers_id')->nullable();
            $table->unsignedInteger('projets_id')->nullable();
            $table->unsignedInteger('traitementcourriers_id')->nullable();

            $table->index(["users_id"], 'fk_courriers_users1_idx');

            $table->index(["types_courriers_id"], 'fk_courriers_types_courriers1_idx');

            $table->index(["projets_id"], 'fk_courriers_projets1_idx');

            $table->index(["traitementcourriers_id"], 'fk_courriers_traitementcourriers1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_courriers_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('types_courriers_id', 'fk_courriers_types_courriers1_idx')
                ->references('id')->on('types_courriers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('projets_id', 'fk_courriers_projets1_idx')
                ->references('id')->on('projets')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('traitementcourriers_id', 'fk_courriers_traitementcourriers1_idx')
                ->references('id')->on('traitementcourriers')
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
