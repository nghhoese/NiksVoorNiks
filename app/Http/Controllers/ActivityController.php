<?php

namespace App\Http\Controllers;

use App\Activiteit;
use App\Categorie;
use App\Groep;
use App\Deelnemer;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function showAll()
    {
        $user = auth()->user();
        $activities = Activiteit::orderby('datum', 'desc')->paginate(4);
        return view('activiteiten', ['activities' => $activities, 'user' => $user]);
    }

    public function create()
    {
        $categories = Categorie::all();
        $groups = Groep::all();
        return view('activiteitPlaatsen', ['categories' => $categories, 'groups' => $groups]);

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:255',
            'date' => ['required', 'date', 'after:tomorrow'],
            'max_participants' => 'required|numeric|digits_between:0,100',
        ]);
        $activiteit = new Activiteit();
        $activiteit->naam = request('title');
        $activiteit->beschrijving = request('description');
        $activiteit->datum = request('date');
        $activiteit->max_deelnemers = request('max_participants');
        $activiteit->save();
        return redirect('/activiteiten');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:255',
            'date' => ['required', 'date', 'after:tomorrow'],
            'max_participants' => 'required|numeric|digits_between:0,100',
        ]);
        $activity = Activiteit::find($id);
        $activity->naam = request('title');
        $activity->beschrijving = request('description');
        $activity->datum = request('date');
        $activity->max_deelnemers = request('max_participants');
        $activity->save();
        return redirect('/activiteiten');
    }

    public function edit($id)
    {
        $activity = Activiteit::find($id);
        return view('activity.edit', ['activity' => $activity]);

    }

    public function view($id)
    {
        $activity = Activiteit::find($id);
        $participants = count($activity->deelnemer()->get());
        $user = auth()->user();
        return view('activiteitDetails', ['activity' => $activity, 'participants' => $participants, 'user' => $user]);
    }

    public function deelnemen($id)
    {
        $activity = Activiteit::find($id);
        $activity->deelnemer()->attach(Deelnemer::find(auth()->user()->email));
        $activity->save();
        return redirect('/activiteitDetails/' . $id);
    }

    public function delete($id){
        $activity = Activiteit::find($id);
        $activity->deelnemer()->detach();
        $activity->delete();
        return redirect('/activiteiten');
    }

}
