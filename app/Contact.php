<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contact";
    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;
}
