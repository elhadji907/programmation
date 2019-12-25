<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperateursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'operateurs';

    /**
     * Run the migrations.
     * @table operateurs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('matricule', 200);
            $table->string('numero', 200);
            $table->string('name', 200);
            $table->string('ninea', 45);
            $table->string('email', 200)->nullable();
            $table->string('telephone', 200)->nullable();
            $table->string('registre', 200);
            $table->string('quitus', 200)->nullable();
            $table->string('status', 200)->nullable();
            $table->string('agreer', 200)->nullable();
            $table->timestamp('date_debut')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('date_fin')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('structures_id');

            $table->index(["users_id"], 'fk_operateurs_users1_idx');

            $table->index(["structures_id"], 'fk_operateurs_structures1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_operateurs_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('structures_id', 'fk_operateurs_structures1_idx')
                ->references('id')->on('structures')
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
