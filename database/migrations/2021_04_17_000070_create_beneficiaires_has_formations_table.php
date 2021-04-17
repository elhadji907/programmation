<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiairesHasFormationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'beneficiaires_has_formations';

    /**
     * Run the migrations.
     * @table beneficiaires_has_formations
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('beneficiaires_id');
            $table->unsignedInteger('formations_id');

            $table->index(["formations_id"], 'fk_beneficiaires_has_formations_formations1_idx');

            $table->index(["beneficiaires_id"], 'fk_beneficiaires_has_formations_beneficiaires1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('beneficiaires_id', 'fk_beneficiaires_has_formations_beneficiaires1_idx')
                ->references('id')->on('beneficiaires')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('formations_id', 'fk_beneficiaires_has_formations_formations1_idx')
                ->references('id')->on('formations')
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
