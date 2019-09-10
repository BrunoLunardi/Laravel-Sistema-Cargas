<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargas', function (Blueprint $table) {
            $table->increments('id');

            //Relação qual veículo transporta as cargas
            $table->integer('veiculo_id')->unsigned();
            $table->foreign('veiculo_id')->references('id')->on('veiculos')->onDelete('cascade');                            

            //Relação demandante e as cargas
            $table->integer('demandante_id')->unsigned();
            $table->foreign('demandante_id')->references('id')->on('users')->onDelete('cascade');                            

            $table->text('descricao_carga')->nullable(false);
            $table->string('status')->nullable(false)->default('pendente');
            $table->decimal('latitude', 10, 5);
            $table->decimal('longitude', 10, 5);
            $table->date('data_entrega', 10, 5);

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
        Schema::dropIfExists('cargas');
    }
}
