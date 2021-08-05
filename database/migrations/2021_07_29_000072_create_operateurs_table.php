<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperateursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'operateurs';

    /**
     * Run the migrations.
     * @table operateurs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('numero_agrement', 200)->nullable();
            $table->string('name', 200)->nullable();
            $table->string('sigle', 200)->nullable();
            $table->string('type_structure', 200)->nullable();
            $table->string('ninea', 200)->nullable();
            $table->string('rccm', 200)->nullable();
            $table->string('quitus', 200)->nullable();
<<<<<<< HEAD:database/migrations/2021_07_29_000072_create_operateurs_table.php
            $table->dateTime('date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('date_debut')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('date_fin')->nullable();
            $table->dateTime('date_renew')->nullable();
=======
>>>>>>> 3cb40d346f7af160a2c3ec9fda13f1a64ec23555:database/migrations/2021_07_29_000072_create_operateurs_table.php
            $table->dateTime('debut_quitus')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('fin_quitus')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->string('telephone1', 200)->nullable();
            $table->string('telephone2', 200)->nullable();
            $table->string('fixe', 200)->nullable();
            $table->string('email1', 200)->nullable();
            $table->string('email2', 200)->nullable();
            $table->string('adresse', 200)->nullable();
            $table->string('nom_responsable', 200)->nullable();
            $table->string('prenom_responsable', 200)->nullable();
            $table->string('cin_responsable', 200)->nullable();
            $table->string('telephone_responsable', 45)->nullable();
            $table->string('email_responsable', 45)->nullable();
            $table->string('fonction_responsable', 200)->nullable();
            $table->longText('qualification')->nullable();
            $table->unsignedInteger('users_id')->nullable();
            $table->unsignedInteger('rccms_id')->nullable();
            $table->unsignedInteger('nineas_id')->nullable();
            $table->unsignedInteger('types_operateurs_id')->nullable();
            $table->unsignedInteger('specialites_id')->nullable();
            $table->unsignedInteger('courriers_id')->nullable();
            $table->unsignedInteger('departements_id')->nullable();

            $table->index(["users_id"], 'fk_operateurs_users1_idx');

            $table->index(["rccms_id"], 'fk_operateurs_rccms1_idx');

            $table->index(["nineas_id"], 'fk_operateurs_nineas1_idx');

            $table->index(["types_operateurs_id"], 'fk_operateurs_types_operateurs1_idx');

            $table->index(["specialites_id"], 'fk_operateurs_specialites1_idx');

            $table->index(["courriers_id"], 'fk_operateurs_courriers1_idx');

            $table->index(["departements_id"], 'fk_operateurs_departements1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_operateurs_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('rccms_id', 'fk_operateurs_rccms1_idx')
                ->references('id')->on('rccms')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('nineas_id', 'fk_operateurs_nineas1_idx')
                ->references('id')->on('nineas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('types_operateurs_id', 'fk_operateurs_types_operateurs1_idx')
                ->references('id')->on('types_operateurs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('specialites_id', 'fk_operateurs_specialites1_idx')
                ->references('id')->on('specialites')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('courriers_id', 'fk_operateurs_courriers1_idx')
                ->references('id')->on('courriers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('departements_id', 'fk_operateurs_departements1_idx')
                ->references('id')->on('departements')
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
