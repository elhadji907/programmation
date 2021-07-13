<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammesHasRegionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'programmes_has_regions';

    /**
     * Run the migrations.
     * @table programmes_has_regions
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('programmes_id');
            $table->unsignedInteger('regions_id');

            $table->index(["regions_id"], 'fk_programmes_has_regions_regions1_idx');

            $table->index(["programmes_id"], 'fk_programmes_has_regions_programmes1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('programmes_id', 'fk_programmes_has_regions_programmes1_idx')
                ->references('id')->on('programmes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('regions_id', 'fk_programmes_has_regions_regions1_idx')
                ->references('id')->on('regions')
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
