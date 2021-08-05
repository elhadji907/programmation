<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'factures';

    /**
     * Run the migrations.
     * @table factures
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
            $table->dateTime('date_etablissement')->nullable();
            $table->string('details', 200)->nullable();
            $table->decimal('montant1')->nullable();
            $table->decimal('montant2')->nullable();
            $table->decimal('autre_montant')->nullable();
            $table->decimal('total')->nullable();
            $table->unsignedInteger('formations_id')->nullable();

            $table->index(["formations_id"], 'fk_factures_formations1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('formations_id', 'fk_factures_formations1_idx')
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
