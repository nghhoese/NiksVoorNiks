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
}
