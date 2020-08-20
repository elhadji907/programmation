<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiairesdiplomesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'beneficiairesdiplomes';

    /**
     * Run the migrations.
     * @table beneficiairesdiplomes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('beneficiaires_id');
            $table->unsignedInteger('diplomes_id');

            $table->index(["diplomes_id"], 'fk_beneficiairesdiplomes_diplomes1_idx');

            $table->index(["beneficiaires_id"], 'fk_beneficiairesdiplomes_beneficiaires1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('beneficiaires_id', 'fk_beneficiairesdiplomes_beneficiaires1_idx')
                ->references('id')->on('beneficiaires')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('diplomes_id', 'fk_beneficiairesdiplomes_diplomes1_idx')
                ->references('id')->on('diplomes')
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
