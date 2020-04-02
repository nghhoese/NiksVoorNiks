<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Advertentie;

class AdvertentieController extends Controller
{
        public function showAdvertenties(){
        $advertentie = Advertentie::paginate(1);
        return view('advertenties',['advertenties' => $advertentie]);
    }
    public function createAdvertentie(){

    }
    public function storeAdvertentie(){
        $user = auth()->user();
        $advertentie = new Advertentie();
        $advertentie->titel = request('titel');
        $advertentie->beschrijving = request('beschrijving');
        $advertentie->deelnemer_email = $user->email;
        
    }
}
