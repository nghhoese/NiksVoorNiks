<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Category;
use App\Groep;
use Faker\Provider\ka_GE\DateTime;
use Illuminate\Http\Request;
use \App\Advertentie;

class AdvertentieController extends Controller
{
    public function showAll()
    {
        $advertentie = Advertentie::paginate(1);
        return view('advertenties', ['advertenties' => $advertentie]);
    }

    public function create()
    {
        $categories = Categorie::all();
        $groups = Groep::all();
        return view('advertentiePlaatsen', ['categories' => $categories, 'groups' => $groups]);

    }

    public function store(Request $request)
    {
        $date = date('d-m-y h:i:s');
        $user = auth()->user();
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'beschrijving' => 'required|max:255',
            'price' => 'required|numeric|digits_between:0,200',
            'img' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);
        $advertentie = new Advertentie();
        $advertentie->titel = request('title');
        $advertentie->beschrijving = request('beschrijving');
        $advertentie->categorie = request('category');
        $advertentie->prijs = request('price');
        $advertentie->foto = request('img');
        $advertentie->postcode = request('locatie');
        $advertentie->vraag = 0;
        $advertentie->bieden = 0;
        $advertentie->aanmaakdatum = $date;
        $advertentie->huisnummer = 1;
        $advertentie->deelnemer_email = $user->email;
        $advertentie->save();
    }

    public function view($id)
    {
        $advertentie = Advertentie::find($id);
        return view('advertentieDetails', ['advertentie' => $advertentie]);

    }
}
