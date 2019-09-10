<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecoHasCargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco_has_cargas', function (Blueprint $table) {

            //Relação endereços
            $table->integer('endereco_id')->unsigned();
            $table->foreign('endereco_id')->references('id')->on('enderecos')->onDelete('cascade');                            

            //Relação cargas
            $table->integer('carga_id')->unsigned();
            $table->foreign('carga_id')->references('id')->on('cargas')->onDelete('cascade');                            

            $table->primary(['endereco_id', 'carga_id']);

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
        Schema::dropIfExists('endereco_has_cargas');
    }
}
