<?php
// Este arquivo é referente ao [RFS011] Cadastro de Administrador. Tarefa no Redmine #44
// Este arquivo é referente ao [RFS012] Atualização de Administrador. Tarefa no Redmine #45
// Este arquivo é referente ao [RFS013] Exclusão de Administrador. Tarefa no Redmine #46
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //define relacionamento entre usuario e motorista
    public function motoristas()
    {
        return $this->belongsTo('App\Motorista', 'user_id', 'id');
    }

}
