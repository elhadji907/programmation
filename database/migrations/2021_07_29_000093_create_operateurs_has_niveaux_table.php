<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperateursHasNiveauxTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'operateurs_has_niveaux';

    /**
     * Run the migrations.
     * @table operateurs_has_niveaux
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('operateurs_id');
            $table->unsignedInteger('niveaux_id');

            $table->index(["niveaux_id"], 'fk_operateurs_has_niveaux_niveaux1_idx');

            $table->index(["operateurs_id"], 'fk_operateurs_has_niveaux_operateurs1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('operateurs_id', 'fk_operateurs_has_niveaux_operateurs1_idx')
                ->references('id')->on('operateurs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('niveaux_id', 'fk_operateurs_has_niveaux_niveaux1_idx')
                ->references('id')->on('niveauxs')
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
