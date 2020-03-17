<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groep extends Model
{
    protected $table = 'groep';
    protected $primaryKey = 'naam';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
    public function advertentie(){
        return $this->belongsToMany('App\Advertentie', 'advertentie_heeft_groep', 'groep_naam', 'advertentie_id');
    }
    public function deelnemer(){
        return $this->belongsToMany('App\Deelnemer', 'deelnemer_heeft_groep', 'deelnemer_email', 'groep_naam');
    }
}
