<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plaats extends Model
{
    protected $table = 'plaats';
    public $timestamps = false;
    protected $primaryKey = 'naam';
    public $incrementing = false;

    public function advertentie()
    {
        return $this->hasMany('App\Advertentie', 'plaats', 'naam');
    }
}


