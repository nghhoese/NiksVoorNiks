<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bericht extends Model
{
    protected $table = 'bericht';
    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    public function deelnemer(){
   
        return $this->belongsTo('App\Deelnemer');
    }

}
