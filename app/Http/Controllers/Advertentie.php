<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Advertentie extends Controller
{
    public function showAdvertenties(){
        $advertentie = \App\Deelnemer::find('nick@niksvoorniks.com')->advertentie()->paginate(1);
        return view('advertenties',['advertenties' => $advertentie]);
    }
}
