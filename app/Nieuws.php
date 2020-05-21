<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nieuws extends Model
{
    public $table = 'nieuws';
    protected $primaryKey = 'id';
    public $incrementing = true;

}
