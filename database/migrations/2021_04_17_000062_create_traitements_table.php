<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTraitementsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'traitements';

    /**
     * Run the migrations.
     * @table traitements
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->longText('observations');
            $table->string('motif', 200)->nullable();
            $table->string('name', 200)->nullable();
            $table->unsignedInteger('operateurs_id')->nullable();

            $table->index(["operateurs_id"], 'fk_traitements_operateurs1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('operateurs_id', 'fk_traitements_operateurs1_idx')
                ->references('id')->on('operateurs')
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
