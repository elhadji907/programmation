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
            $table->string('code', 200);
            $table->unsignedInteger('typesformations_id');
            $table->unsignedInteger('certifications_id');

            $table->index(["typesformations_id"], 'fk_formations_typesformations1_idx');

            $table->index(["certifications_id"], 'fk_formations_certifications1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('typesformations_id', 'fk_formations_typesformations1_idx')
                ->references('id')->on('typesformations')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('certifications_id', 'fk_formations_certifications1_idx')
                ->references('id')->on('certifications')
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
