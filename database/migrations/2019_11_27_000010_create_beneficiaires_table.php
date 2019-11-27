<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiairesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'beneficiaires';

    /**
     * Run the migrations.
     * @table beneficiaires
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('matricule', 200);
            $table->string('cin', 20);
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('villages_id');
            $table->unsignedInteger('nivaus_id');

            $table->index(["nivaus_id"], 'fk_beneficiaires_nivaus1_idx');

            $table->index(["villages_id"], 'fk_beneficiaires_villages1_idx');

            $table->index(["users_id"], 'fk_beneficiaires_users1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_beneficiaires_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('villages_id', 'fk_beneficiaires_villages1_idx')
                ->references('id')->on('villages')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('nivaus_id', 'fk_beneficiaires_nivaus1_idx')
                ->references('id')->on('nivaus')
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
