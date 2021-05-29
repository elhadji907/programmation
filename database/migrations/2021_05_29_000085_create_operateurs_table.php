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
            $table->string('telephone1', 200)->nullable();
            $table->string('telephone2', 200)->nullable();
            $table->string('fixe', 200)->nullable();
            $table->string('email1', 200)->nullable();
            $table->string('email2', 200)->nullable();
            $table->string('adresse', 200)->nullable();
            $table->unsignedInteger('communes_id')->nullable();
            $table->unsignedInteger('users_id')->nullable();
            $table->unsignedInteger('rccms_id')->nullable();
            $table->unsignedInteger('nineas_id')->nullable();
            $table->unsignedInteger('types_operateurs_id')->nullable();
            $table->unsignedInteger('quitus_id')->nullable();
            $table->unsignedInteger('responsables_id')->nullable();
            $table->unsignedInteger('specialites_id')->nullable();
            $table->unsignedInteger('courriers_id')->nullable();

            $table->index(["communes_id"], 'fk_operateurs_communes1_idx');

            $table->index(["users_id"], 'fk_operateurs_users1_idx');

            $table->index(["rccms_id"], 'fk_operateurs_rccms1_idx');

            $table->index(["nineas_id"], 'fk_operateurs_nineas1_idx');

            $table->index(["types_operateurs_id"], 'fk_operateurs_types_operateurs1_idx');

            $table->index(["quitus_id"], 'fk_operateurs_quitus1_idx');

            $table->index(["responsables_id"], 'fk_operateurs_responsables1_idx');

            $table->index(["specialites_id"], 'fk_operateurs_specialites1_idx');

            $table->index(["courriers_id"], 'fk_operateurs_courriers1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('communes_id', 'fk_operateurs_communes1_idx')
                ->references('id')->on('communes')
                ->onDelete('no action')
                ->onUpdate('no action');

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

            $table->foreign('quitus_id', 'fk_operateurs_quitus1_idx')
                ->references('id')->on('quitus')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('responsables_id', 'fk_operateurs_responsables1_idx')
                ->references('id')->on('responsables')
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
