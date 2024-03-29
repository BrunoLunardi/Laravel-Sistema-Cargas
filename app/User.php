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
        'roles' => 'array',
    ];

    //define relacionamento entre usuario e motorista
    public function motoristas()
    {
        return $this->belongsTo('App\Motorista', 'user_id', 'id');
    }

    /***
 * @param string $role
 * @return $this
 */
public function addRole(string $role)
{
    $roles = $this->getRoles();
    $roles[] = $role;
    
    $roles = array_unique($roles);
    $this->setRoles($roles);

    return $this;
}

/**
 * @param array $roles
 * @return $this
 */
public function setRoles(array $roles)
{
    $this->setAttribute('roles', $roles);
    return $this;
}

/***
 * @param $role
 * @return mixed
 */
public function hasRole($role)
{
    return in_array($role, $this->getRoles());
}

/***
 * @param $roles
 * @return mixed
 */
public function hasRoles($roles)
{
    $currentRoles = $this->getRoles();
    foreach($roles as $role) {
        if ( ! in_array($role, $currentRoles )) {
            return false;
        }
    }
    return true;
}

/**
 * @return array
 */
public function getRoles()
{
    $roles = $this->getAttribute('roles');

    if (is_null($roles)) {
        $roles = [];
    }

    return $roles;
}

}
