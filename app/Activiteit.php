<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Activiteit extends Model
{
    protected $table = 'activiteit';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public function setDateAttribute( $value ) {
        $this->attributes['datum'] = (new Carbon($value))->format('d/m/y');
    }

    public $timestamps = false;

    public function deelnemer(){
        return $this->belongsToMany('App\Deelnemer', 'activiteit_heeft_deelnemer', 'activiteit_id', 'deelnemer_email');
    }
}
