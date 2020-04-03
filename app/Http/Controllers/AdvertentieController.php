<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Advertentie;

class AdvertentieController extends Controller
{
        public function showAll(){
        $advertentie = Advertentie::paginate(1);
        return view('advertenties',['advertenties' => $advertentie]);
    }
    public function create(){
        return view('advertentiePlaatsen');

    }
    public function store(){
        $user = auth()->user();
        $advertentie = new Advertentie();
        $advertentie->titel = request('titel');
        $advertentie->beschrijving = request('beschrijving');
        $advertentie->deelnemer_email = $user->email;

    }

    public function view($id){
            $advertentie = Advertentie::find($id);
            return view('advertentieDetails',['advertentie' =>$advertentie]);

    }
}
