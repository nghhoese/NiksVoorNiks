<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Advertentie;

class AdvertentieController extends Controller
{
    public function showAll() {
        $advertentie = Advertentie::paginate(4);
        return view('advertenties',['advertenties' => $advertentie]);
    }

    public function filter(){
        $advertenties = Advertentie::all();
        if(request()->has('gevraagd')) {
            $advertenties = $advertenties->where('gevraagd', request('gevraagd'));
        }

        if(request()->has('aangeboden')) {
            $advertenties = $advertenties->where('aangeboden', request('aangeboden'));
        }


        $advertenties = $advertenties->paginate(10)->appends([
            'gevraagd', request('gevraagd'),
            'aangeboden', request('aangeboden'),
        ]);

        return view('advertenties', compact('advertenties'));
    }

    public function create(){

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
