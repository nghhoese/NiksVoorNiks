<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deelnemer extends Model
{
    protected $table = 'deelnemer';
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
    public function bericht()
    {
        return $this->hasMany('App\Bericht', 'zender_email', 'email');
    }
    public function bericht1()
    {
        return $this->hasMany('App\Bericht', 'ontvanger_email', 'email');
    }
    public function loginactie()
    {
        return $this->hasMany('App\Loginactie', 'deelnemer_email', 'email');
    }
    public function advertentie()
    {
        return $this->hasMany('App\Advertentie', 'deelnemer_email', 'email');
    }
    public function rol(){
        return $this->belongsTo('App\Rol');
    }
}
