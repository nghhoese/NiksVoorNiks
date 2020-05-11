<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactie extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = true;
    const CREATED_AT = 'datum';

    public $timestamps = false;
    public function deelnemer(){

        return $this->belongsTo('App\Deelnemer');
    }

}
