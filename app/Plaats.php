<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plaats extends Model
{
    public function advertentie()
    {
        return $this->hasMany('App\Advertentie', 'plaats', 'naam');
    }
}
