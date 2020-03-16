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
}
