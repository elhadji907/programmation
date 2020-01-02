<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'personnels';

    /**
     * Run the migrations.
     * @table personnels
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('matricule', 200)->nullable();
            $table->string('cin', 200)->nullable();
            $table->dateTime('debut')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('fin')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('nbrefant')->nullable()->default('0');
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('directions_id');
            $table->unsignedInteger('categories_id');
            $table->unsignedInteger('fonctions_id');

            $table->index(["fonctions_id"], 'fk_personnels_fonctions1_idx');

            $table->index(["users_id"], 'fk_personnels_users1_idx');

            $table->index(["directions_id"], 'fk_personnels_directions1_idx');

            $table->index(["categories_id"], 'fk_personnels_categories1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_personnels_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('directions_id', 'fk_personnels_directions1_idx')
                ->references('id')->on('directions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('categories_id', 'fk_personnels_categories1_idx')
                ->references('id')->on('categories')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fonctions_id', 'fk_personnels_fonctions1_idx')
                ->references('id')->on('fonctions')
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
