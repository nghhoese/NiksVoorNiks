<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Advertentie extends Controller
{
    public function showAdvertenties(){
        $advertentie = \App\Advertentie::paginate(4);
        return view('advertenties',['advertenties' => $advertentie]);
    }
}
