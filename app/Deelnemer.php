<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Deelnemer extends Authenticatable
{
    protected $table = 'deelnemer';
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    protected $fillable = [
        'voornaam', 'email', 'wachtwoord', 'tussenvoegsel', 'achternaam', 'postcode', 'huisnummer', 'telefoonnummer', 'geboortedatum', 'rol_naam', 'niksen', 'beschrijving'
    ];

    protected $hidden = [
        'wachtwoord', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        if($this->rol->naam == 'administrator'){
            return true;
        }
        return false;
    }

    public function getAuthPassword()
    {
        return $this->wachtwoord;
    }

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
    public function activiteit(){
        return $this->belongsToMany('App\Activiteit', 'activiteit_heeft_deelnemer', 'deelnemer_email', 'activiteit_id');

    }
    public function groep(){
        return $this->belongsToMany('App\Groep', 'deelnemer_heeft_groep', 'deelnemer_email', 'groep_naam');
    }
    public function transactie()
    {
        return $this->hasMany('App\Transactie', 'zender_email', 'email');
    }
    public function transactie1()
    {
        return $this->hasMany('App\Transactie', 'ontvanger_email', 'email');
    }
}
