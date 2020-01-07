<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamillesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'familles';

    /**
     * Run the migrations.
     * @table familles
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('firstname', 200)->nullable();
            $table->string('name', 200)->nullable();
            $table->dateTime('date_naissance')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('lieu_naissance', 200)->nullable();
            $table->string('lien', 200)->nullable();
            $table->string('sexe', 45)->nullable();
            $table->unsignedInteger('personnels_id');

            $table->index(["personnels_id"], 'fk_familles_personnels1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('personnels_id', 'fk_familles_personnels1_idx')
                ->references('id')->on('personnels')
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
