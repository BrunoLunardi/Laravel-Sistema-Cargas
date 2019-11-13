<?php
// Este arquivo é referente ao [RFS01] Cadastro de cargas. Tarefa no Redmine #34
// Este arquivo é referente ao [RFS03] Atualização de cargas. Tarefa no Redmine #36
// Este arquivocode class=""> Exclusão de cargas. Tarefa no Redmine #37
// Este arquivo é referente ao [RFS08] Cadastro de Motorista. Tarefa no Redmine #41
namespace App;

use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
        //define relacionamento entre usuario e motorista
        public function users()
        {
            return $this->hasOne('App\User', 'user_id', 'id');
        }
}
