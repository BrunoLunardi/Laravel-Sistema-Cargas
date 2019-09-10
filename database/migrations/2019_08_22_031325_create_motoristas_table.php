<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotoristasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motoristas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('cnh', 11)->unique()->nullable(false);
            $table->char('tipo_cnh', 1)->unique()->nullable(false);
            $table->text('obs');

            //Relação motorista é usuário
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');                

            //Relação adm cadastra motorista
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
        Schema::dropIfExists('motoristas');
    }
}
