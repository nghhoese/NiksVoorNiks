<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Category;
use App\Groep;
use DB;
use Faker\Provider\ka_GE\DateTime;
use Illuminate\Http\Request;
use \App\Advertentie;

class AdvertentieController extends Controller
{
    public function showAll()
    {
        $advertentie = Advertentie::paginate(4);
        $categories = Categorie::all();
        $groups = Groep::all();
        return view('advertenties', ['advertenties' => $advertentie, 'categories' => $categories, 'groups' => $groups]);
    }

    public function filter(Request $request){

        $advertentie = Advertentie::when($request->get('gevraagd'), function ($query) {
            $query->where('vraag', 1);
        })
        ->when($request->get('aangeboden'), function ($query) {
            $query->where('vraag', 0);
        })
        ->when($request->get('selectCategory'), function ($query) {
            $query->where('categorie', request('selectCategory'));
        })
        // ->when($request->get('selectGroup'), function ($query) {
        //     $query->where('groep', request('selectGroup'));
        // })
        ->when($request->get('maxPrice'), function ($query) {
            $query->where('prijs', '<=' , request('maxPrice'));
        })
        ->when($request->get('minPrice'), function ($query) {
            $query->where('prijs', '>=' , request('minPrice'));
        })
        ->paginate(4);
        $categorie = request('selectCategory');
        $maxPrice = request('maxPrice');        
        $minPrice = request('minPrice');
        $group = request('selectGroup');
        $gevraagd = 0;
        if(request('gevraagd') != null){
            $gevraagd = 1;
        }
        $categories = Categorie::all();
        $groups = Groep::all();
        return view('advertenties', ['gevraagd' => $gevraagd,'groep' => $group,'minPrijs' => $minPrice,'maxPrijs' => $maxPrice,'categorie' => $categorie, 'advertenties' => $advertentie, 'categories' => $categories, 'groups' => $groups]);
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
        if($request->file != null) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $request->file->move(public_path('uploads'), $fileName);
            $advertentie->foto = "/uploads/".$fileName;
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
        return redirect('/advertentieDetails/'.$advertentie->id);
    }

    public function view($id)
    {
        $advertentie = Advertentie::find($id);
        return view('advertentieDetails', ['advertentie' => $advertentie]);

    }
}
