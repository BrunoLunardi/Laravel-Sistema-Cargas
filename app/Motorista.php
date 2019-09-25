<?php

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
