<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loginactie extends Model
{
    protected $table = 'loginactie';
    protected $primaryKey = 'deelnemer_email';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = true;
    const CREATED_AT = 'datum';
    const UPDATED_AT = 'last_update';
    public function deelnemer()
    {
        return $this->belongsTo('App\Deelnemer');
    }
}
