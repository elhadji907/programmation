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
            $table->string('name', 200)->nullable();
            $table->string('types', 200)->nullable();
            $table->string('description', 200)->nullable();
            $table->string('fichier', 200)->nullable();
            $table->string('statut', 200)->nullable();
            $table->timestamp('date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('gestionnaires_id');
            $table->unsignedInteger('users_id')->nullable();
            $table->unsignedInteger('employees_id')->nullable();
            $table->dateTime('date_imp')->nullable();
            $table->dateTime('date_recep')->nullable();
            $table->dateTime('date_rejet')->nullable();
            $table->dateTime('date_liq')->nullable();

            $table->index(["gestionnaires_id"], 'fk_courriers_gestionnaires1_idx');

            $table->index(["users_id"], 'fk_courriers_users1_idx');

            $table->index(["employees_id"], 'fk_courriers_employees1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('gestionnaires_id', 'fk_courriers_gestionnaires1_idx')
                ->references('id')->on('gestionnaires')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('users_id', 'fk_courriers_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('employees_id', 'fk_courriers_employees1_idx')
                ->references('id')->on('employees')
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
