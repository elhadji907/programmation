<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperateursmodulesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'operateursmodules';

    /**
     * Run the migrations.
     * @table operateursmodules
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('operateurs_id');
            $table->unsignedInteger('modules_id');

            $table->index(["modules_id"], 'fk_operateurs_has_modules_modules1_idx');

            $table->index(["operateurs_id"], 'fk_operateurs_has_modules_operateurs1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('operateurs_id', 'fk_operateurs_has_modules_operateurs1_idx')
                ->references('id')->on('operateurs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('modules_id', 'fk_operateurs_has_modules_modules1_idx')
                ->references('id')->on('modules')
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
