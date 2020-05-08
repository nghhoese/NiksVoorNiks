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
        return view('activiteitPlaatsen', ['categories' => $categories, 'groups' => $groups]);

    }

    public function store(Request $request)
    {
        $date = date('d-m-y h:i:s');
        $user = auth()->user();
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'beschrijving' => 'required|max:255',
            'date' => ['required', 'date', 'after:tomorrow'],
        ]);
        $activiteit = new Activiteit();
        $activiteit->naam = request('title');
        $activiteit->beschrijving = request('beschrijving');
        $activiteit->datum = request('date');
        $activiteit->save();
        return redirect('/activiteiten');
    }
}

//    public function view($id)
//    {
//        $advertentie = Advertentie::find($id);
//        return view('advertentieDetails', ['advertentie' => $advertentie]);
//    }}
