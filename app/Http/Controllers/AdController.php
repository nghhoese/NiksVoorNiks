<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Category;
use App\Groep;
use Illuminate\Support\Facades\File;
use App\Plaats;
use Faker\Provider\ka_GE\DateTime;
use Illuminate\Http\Request;
use \App\Advertentie;
use DB;

class AdController extends Controller
{
    public function showAll()
    {
        $advertentie = Advertentie::paginate(4);
        $categories = Categorie::all();
        $groups = Groep::all();
        $places = Plaats::all();

        return view('ad.index', ['advertenties' => $advertentie, 'categories' => $categories, 'groups' => $groups, 'places' => $places]);
    }

    public function create()
    {
        $categories = Categorie::all();
        $groups = Groep::all();
        $places = Plaats::all();
        return view('ad.create', ['categories' => $categories, 'groups' => $groups, 'places' => $places]);

    }

    public function store(Request $request)
    {
        $date = date('d-m-y h:i:s');
        $user = auth()->user();
        $validatedData = $request->validate([
            'titel' => 'required|max:50',
            'beschrijving' => 'required|max:255',
            'prijs' => 'required|numeric|digits_between:0,200',
            'location' => 'required|max:50',
            'asked' => 'required',
            'price-type' => 'required',
            'file' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $advertentie = new Advertentie();
        if ($request->file != null) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $request->file->move(public_path('uploads'), $fileName);
            $advertentie->foto = "/uploads/" . $fileName;
        }
        $advertentie->titel = request('titel');
        $advertentie->beschrijving = request('beschrijving');
        $advertentie->categorie = request('category');
        $advertentie->prijs = request('prijs');
        $advertentie->plaats = request('location');
        $advertentie->vraag = request('asked');
        $advertentie->bieden = request('price-type');
        $advertentie->aanmaakdatum = $date;
        $advertentie->deelnemer_email = $user->email;
        $advertentie->save();
        return redirect('/advertentieDetails/' . $advertentie->id);
    }

    public function view($id)
    {
        $user = auth()->user();
        $advertentie = Advertentie::find($id);
        if ($advertentie == null) {
            return redirect('/');
        }
        return view('ad.details', ['advertentie' => $advertentie, 'email' => $user->email]);

    }

    public function edit($id)
    {
        $user = auth()->user();
        $ad = Advertentie::find($id);
        if ($user->email != $ad->deelnemer_email) {
            return redirect('/');
        }
        $categories = Categorie::all();
        $groups = Groep::all();
        $places = Plaats::all();
        return view('ad.edit', ['ad' => $ad, 'categories' => $categories, 'groups' => $groups, 'places' => $places]);


    }

    public function update($id, Request $request)
    {
        $user = auth()->user();
        $ad = Advertentie::find($id);
        if ($user->email != $ad->deelnemer_email) {
            return redirect('/');
        }
        $date = date('d-m-y h:i:s');

        $validatedData = $request->validate([
            'titel' => 'required|max:50',
            'beschrijving' => 'required|max:255',
            'prijs' => 'required|numeric|digits_between:0,200',
            'location' => 'required|max:50',
            'asked' => 'required',
            'price-type' => 'required',
            'file' => 'mimes:jpeg,jpg,png,gif|max:5000',
        ]);

        if ($request->file != null) {
            $file_path = substr($ad->foto, 1);
            if ($ad->foto != null) {
                unlink($file_path);
            }
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $request->file->move(public_path('uploads'), $fileName);
            $ad->foto = "/uploads/" . $fileName;
        }
        $ad->titel = request('titel');
        $ad->beschrijving = request('beschrijving');
        $ad->categorie = request('category');
        $ad->prijs = request('prijs');
        $ad->plaats = request('location');
        $ad->vraag = request('asked');
        $ad->bieden = request('price-type');
        $ad->aanmaakdatum = $date;
        $ad->save();
        return redirect('/advertentieDetails/' . $ad->id);
    }

    public function delete($id)
    {
        $user = auth()->user();
        $ad = Advertentie::find($id);
        if ($user->isAdmin() || $user->email == $ad->deelnemer_email) {
            $file_path = substr($ad->foto, 1);
            if ($ad->foto != null) {
                unlink($file_path);
            }
            $ad->delete();
            return redirect('/advertenties');
        } else {
            return redirect('/');
        }
    }

    public function filter(Request $request)
    {
        if (request('gevraagd') != null && request('aangeboden') != null) {
            $request->offsetUnset('gevraagd');
            $request->offsetUnset('aangeboden');
        }
        $group = request('selectGroup');
        if ($group == null) {
            $advertentie = Advertentie::when($request->get('gevraagd'), function ($query) {
                $query->where('vraag', 1);
            })
                ->when($request->get('aangeboden'), function ($query) {
                    $query->where('vraag', 0);
                })
                ->when($request->get('selectCategory'), function ($query) {
                    $query->where('categorie', request('selectCategory'));
                })
                ->when($request->get('selectCategory'), function ($query) {
                    $query->where('categorie', request('selectCategory'));
                })
                ->when($request->get('selectPlace'), function ($query) {
                    $query->where('plaats', '=', request('selectPlace'));
                })
                ->when($request->get('minPrice'), function ($query) {
                    $query->where('prijs', '>=', request('minPrice'));
                })
                ->when($request->get('maxPrice'), function ($query) {
                    $query->where('prijs', '<=', request('maxPrice'));
                })
                ->paginate(4);
        } else {
            $advertentie = Groep::find($group)->advertentie()->when($request->get('gevraagd'), function ($query) {
                $query->where('vraag', 1);
            })
                ->when($request->get('aangeboden'), function ($query) {
                    $query->where('vraag', 0);
                })
                ->when($request->get('selectCategory'), function ($query) {
                    $query->where('categorie', request('selectCategory'));
                })
                ->when($request->get('selectPlace'), function ($query) {
                    $query->where('plaats', '=', request('selectPlace'));
                })
                ->when($request->get('minPrice'), function ($query) {
                    $query->where('prijs', '>=', request('minPrice'));
                })
                ->when($request->get('maxPrice'), function ($query) {
                    $query->where('prijs', '<=', request('maxPrice'));
                })
                ->paginate(4);
        }

        $categorie = request('selectCategory');
        $maxPrice = request('maxPrice');
        $minPrice = request('minPrice');
        $group = request('selectGroup');
        $location = request('selectPlace');
        $gevraagd = request('gevraagd');
        $aangeboden = request('aangeboden');


        $categories = Categorie::all();
        $groups = Groep::all();
        $places = Plaats::all();
        return view('ad.index', ['plaats' => $location, 'places' => $places, 'locatie' => $location, 'aangeboden' => $aangeboden, 'gevraagd' => $gevraagd, 'groep' => $group, 'minPrijs' => $minPrice, 'maxPrijs' => $maxPrice, 'categorie' => $categorie, 'advertenties' => $advertentie, 'categories' => $categories, 'groups' => $groups]);
    }
}
