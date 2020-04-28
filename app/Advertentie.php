<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertentie extends Model
{
    protected $table = 'advertentie';
    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;
    const CREATED_AT = 'aanmaakdatum';
    const UPDATED_AT = 'last_update';

    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }
    public function plaats(){
        return $this->belongsTo('App\Plaats');
    }
    public function deelnemer(){
        return $this->belongsTo('App\Deelnemer');
    }
    public function groep(){
        return $this->belongsToMany('App\Groep', 'advertentie_heeft_groep', 'groep_naam', 'advertentie_id');
    }
}
