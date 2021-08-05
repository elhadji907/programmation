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
            $table->timestamp('date_mandat')->nullable();
            $table->longText('designation')->nullable();
            $table->double('montant')->nullable();
            $table->integer('nombre_de_piece')->nullable();
            $table->longText('observation')->nullable();
            $table->unsignedInteger('courriers_id');
            $table->unsignedInteger('listes_id')->nullable();

            $table->index(["courriers_id"], 'fk_bordereaus_courriers1_idx');

            $table->index(["listes_id"], 'fk_bordereaus_listes1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('courriers_id', 'fk_bordereaus_courriers1_idx')
                ->references('id')->on('courriers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('listes_id', 'fk_bordereaus_listes1_idx')
                ->references('id')->on('listes')
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
