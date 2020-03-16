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
}
