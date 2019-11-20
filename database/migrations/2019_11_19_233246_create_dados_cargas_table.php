<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDadosCargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_cargas', function (Blueprint $table) {
            $table->increments('id');

            //Relação dadoscargas e as cargas
            $table->integer('carga_id')->unsigned();
            $table->foreign('carga_id')->references('id')->on('cargas')->onDelete('cascade');                           
            
            //Relação veiculos e as cargas
            $table->integer('veiculo_id')->unsigned();
            $table->foreign('veiculo_id')->references('id')->on('veiculos')->onDelete('cascade');                           

            //Relação motoristas e as cargas
            $table->integer('motoristas_id')->unsigned();
            $table->foreign('motoristas_id')->references('id')->on('motoristas')->onDelete('cascade');                           

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
        Schema::dropIfExists('dados_cargas');
    }
}
