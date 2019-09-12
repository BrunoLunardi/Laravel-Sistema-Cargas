<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('cpf', 11)->unique()->nullable(false);
            $table->string('name', 100)->unique()->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            //$table->date('data_nascimento')->nullable(false);
            $table->string('password')->nullable(false);
            
            //false => usuário ativo
            //true  => usuário deletado
            $table->string('deleted')->nullable(true)->default('false');
            
            $table->rememberToken();
            $table->timestamps();


            //relação de endereco do usuario
            //$table->integer('endereco_id')->unsigned();
//            $table->foreign('endereco_id')->references('id')->on('enderecos')->onDelete('cascade');                            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
