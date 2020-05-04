<?php

namespace App\Http\Controllers;

use App\Activiteit;
use App\Advertentie;
use App\Categorie;
use App\Groep;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function showAll()
    {
        $activities = Activiteit::paginate(4);
        return view('activiteiten', ['activities' => $activities]);
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
            'housenumber' => 'required|max:10',
            'asked' => 'required',
            'price-type' => 'required',
            'img' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $advertentie = new Advertentie();
        if ($request->file != null) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $request->file->move(public_path('uploads'), $fileName);
            $advertentie->foto = "/uploads/" . $fileName;
        }
        $advertentie->titel = request('title');
        $advertentie->beschrijving = request('beschrijving');
        $advertentie->categorie = request('category');
        $advertentie->prijs = request('price');
        $advertentie->postcode = request('locatie');
        $advertentie->vraag = request('asked');
        $advertentie->bieden = request('price-type');
        $advertentie->aanmaakdatum = $date;
        $advertentie->huisnummer = request('housenumber');
        $advertentie->deelnemer_email = $user->email;
        $advertentie->save();
        return redirect('/advertentieDetails/' . $advertentie->id);
    }

    public function view($id)
    {
        $advertentie = Advertentie::find($id);
        return view('advertentieDetails', ['advertentie' => $advertentie]);
    }}
