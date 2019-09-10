<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->increments('id');

                //Relação motorista dirige veículo
                $table->integer('motorista_id')->unsigned();
                $table->foreign('motorista_id')->references('id')->on('motoristas')->onDelete('cascade');                

                $table->string('placa', 7)->nullable(false);
                $table->string('marca', 45)->nullable(false);
                $table->string('modelo', 45)->nullable(false);
                $table->string('renavam', 45)->nullable(false);

                //Relação adm cadastra veículos
                $table->integer('administrador_id')->unsigned();
                $table->foreign('administrador_id')->references('id')->on('users')->onDelete('cascade');                            

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
        Schema::dropIfExists('veiculos');
    }
}
