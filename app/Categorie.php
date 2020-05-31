<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categorie';
    protected $primaryKey = 'naam';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
    public function advertentie()
    {
        return $this->hasMany('App\Advertentie', 'categorie', 'naam');
    }
}
