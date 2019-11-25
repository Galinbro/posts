<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeticionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peticions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->index()->unsigned();
            $table->bigInteger('responsable_id')->index()->unsigned()->default(0);
            $table->string('ug');
            $table->string('id_grupo');
            $table->string('id_cliente');
            $table->string('nb_cliente');
            $table->string('producto');
            $table->double('tarifa');
            $table->double('rentabilidad');
            $table->string('reciprocidad');
            $table->double('reciprocidad_num');
            $table->string('argumento');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peticions');
    }
}
