<?php
// Este arquivo é referente ao [RFS05] Cadastro de Demandante. Tarefa no Redmine #38
// Este arquivo é referente ao [RFS06] Atualização de Demandante. Tarefa no Redmine #39
// Este arquivo é referente ao [RFS011] Cadastro de Administrador. Tarefa no Redmine #44
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
