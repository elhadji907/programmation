<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFindividuellesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'findividuelles';

    /**
     * Run the migrations.
     * @table findividuelles
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('code', 200);
            $table->string('categorie', 200)->nullable();
            $table->unsignedInteger('formations_id');

            $table->index(["formations_id"], 'fk_formations_individuelles_formations1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('formations_id', 'fk_formations_individuelles_formations1_idx')
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
