<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Advertentie extends Controller
{
    // public function showAdvertenties(){
    //     $advertentie = \App\Deelnemer::find('nick@niksvoorniks.com')->advertentie()->paginate(1);
    //     return view('advertenties',['advertenties' => $advertentie]);
    // }

    public function showAdvertenties(){
        $advertentie = new Advertentie;


        if(request()->has('gevraagd')) {
            $advertentie = $advertentie->where('gevraagd', request('gevraagd'));
        }

        if(request()->has('aangeboden')) {
            $advertentie = $advertentie->where('aangeboden', request('aangeboden'));
        }


        $advertentie = $advertentie->paginate(10)->appends([
            'gevraagd', request('gevraagd'),
            'aangeboden', request('aangeboden'),
        ]);

        return view('advertenties', compact('advertenties'));
    }

    // public function filterAdvertenties(){
    //     $advertentie = \App\Advertentie::find('nick@niksvoorniks.com')->advertentie()->where('categorie', '=', 'aids') ->where('groep', '=', 'homos uit schijndel')->paginate(1);
    //     return view('advertenties',['advertenties' => $advertentie]); 
    // }
}
