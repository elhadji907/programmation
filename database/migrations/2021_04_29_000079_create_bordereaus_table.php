<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBordereausTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'bordereaus';

    /**
     * Run the migrations.
     * @table bordereaus
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('numero', 200)->nullable();
            $table->integer('numero_mandat')->nullable();
            $table->unsignedInteger('dafs_id')->nullable();
            $table->timestamp('date_mandat')->nullable();
            $table->longText('designation')->nullable();
            $table->double('montant')->nullable();
            $table->integer('nombre_de_piece')->nullable();
            $table->longText('observation')->nullable();

            $table->index(["dafs_id"], 'fk_bordereaus_dafs1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('dafs_id', 'fk_bordereaus_dafs1_idx')
                ->references('id')->on('dafs')
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
