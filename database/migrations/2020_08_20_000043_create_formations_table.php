<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'formations';

    /**
     * Run the migrations.
     * @table formations
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('code', 200)->nullable();
            $table->string('numero', 200)->nullable();
            $table->timestamp('debut')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fin')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('modules_id');
            $table->unsignedInteger('operateurs_id');
            $table->unsignedInteger('categorietitres_id')->nullable();

            $table->index(["operateurs_id"], 'fk_formations_operateurs1_idx');

            $table->index(["categorietitres_id"], 'fk_formations_categorietitres1_idx');

            $table->index(["modules_id"], 'fk_formations_modules1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('modules_id', 'fk_formations_modules1_idx')
                ->references('id')->on('modules')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('operateurs_id', 'fk_formations_operateurs1_idx')
                ->references('id')->on('operateurs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('categorietitres_id', 'fk_formations_categorietitres1_idx')
                ->references('id')->on('categorietitres')
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