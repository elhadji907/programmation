<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'details';

    /**
     * Run the migrations.
     * @table details
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
            $table->unsignedInteger('formations_id');

            $table->index(["formations_id"], 'fk_details_formations1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('formations_id', 'fk_details_formations1_idx')
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
