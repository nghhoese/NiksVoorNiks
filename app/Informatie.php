<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informatie extends Model
{
    protected $primaryKey = "naam";
    protected $keyType = "string";
    public $incrementing = false;
    protected $table = 'informatie';

    public $timestamps = false;
}
