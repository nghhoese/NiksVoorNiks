<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nieuws extends Model
{
    public $table = 'news';
    protected $primaryKey = 'id';
    public $incrementing = true;

}
