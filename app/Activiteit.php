<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activiteit extends Model
{
    protected $table = 'activiteit';
    protected $primaryKey = 'id';
    public $incrementing = true;

    //timestamps kan wel op true, mochten we het ooit ergens nodig voor hebben.
    // Maar kans is zo klein, dat hij van mij ook op false mag blijven
    public $timestamps = true;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
    public function deelnemer(){
        return $this->belongsToMany('App\Deelnemer', 'activiteit_heeft_deelnemer', 'deelnemer_email', 'activiteit_id');
    }
    public function groep(){
        return $this->belongsToMany('App\Groep', 'activiteit_heeft_deelnemer', 'deelnemer_email', 'activiteit_id');
    }
    
}
