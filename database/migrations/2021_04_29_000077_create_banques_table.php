<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanquesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'banques';

    /**
     * Run the migrations.
     * @table banques
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->unsignedInteger('dafs_id')->nullable();
            $table->unsignedInteger('projets_id')->nullable();

            $table->index(["dafs_id"], 'fk_banques_dafs1_idx');

            $table->index(["projets_id"], 'fk_banques_projets1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('dafs_id', 'fk_banques_dafs1_idx')
                ->references('id')->on('dafs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('projets_id', 'fk_banques_projets1_idx')
                ->references('id')->on('projets')
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
