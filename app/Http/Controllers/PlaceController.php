<?php

namespace App\Http\Controllers;

use App\Activiteit;
use Illuminate\Http\Request;
use App\Plaats;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Plaats::all();
        return view('admin.place.index', ['places' => $places]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'plaats' => ['required', 'max:100', 'string', 'unique:plaats,naam'],
        ]);
        $place = new Plaats();
        $place->naam = request('plaats');
        $place->save();
        return redirect('/plaats');
    }

    public function delete($name)
    {
        $place = Plaats::find($name);
        if (count($place->advertentie) > 0) {
            $error = 'Er zijn advertenties die gebruik maken van deze plaats.';
            $places = Plaats::all();
            return view('admin.place.index', ['places' => $places, 'error' => $error]);
        }
        $place->delete();
        return redirect('/plaats');
    }
}
