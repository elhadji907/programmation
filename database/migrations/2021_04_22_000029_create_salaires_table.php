<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalairesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'salaires';

    /**
     * Run the migrations.
     * @table salaires
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->double('montant');
            $table->double('prime')->nullable();
            $table->integer('note')->nullable();
            $table->double('autre_montant')->nullable();
            $table->unsignedInteger('categories_id');

            $table->index(["categories_id"], 'fk_salaires_categories1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('categories_id', 'fk_salaires_categories1_idx')
                ->references('id')->on('categories')
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
