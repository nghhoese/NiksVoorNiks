<?php

namespace App\Http\Controllers;

use App\Nieuws;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function showAll()
    {
        $user = auth()->user();
        $newsitems = News::orderby('datum', 'desc')->paginate(4);
        return view('nieuws', ['news' => $news]);
    }

    public function create()
    {
        return view('nieuwsPlaatsen');

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:255',
            'date' => ['required', 'date', 'after:tomorrow'],
        ]);
        $nieuws = new Nieuws();
        $nieuws->naam = request('title');
        $nieuws->beschrijving = request('description');
        $nieuws->datum = request('date');
        $nieuws->save();
        return redirect('/nieuws');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:255',
            'date' => ['required', 'date', 'after:tomorrow'],
        ]);
        $news = Nieuws::find($id);
        $news->naam = request('title');
        $news->beschrijving = request('description');
        $news->datum = request('date');
        $news->max_deelnemers = request('max_participants');
        $news->save();
        return redirect('/nieuws');
    }

    public function edit($id)
    {
        $news = Nieuws::find($id);
        return view('news.edit', ['news' => $news]);

    }

    public function view($id)
    {
        $news = Nieuws::find($id);
        $user = auth()->user();
        return view('nieuwsDetails', ['news' => $news, 'user' => $user]);
    }

    public function delete($id){
        $news = Nieuws::find($id);
        $news->delete();
        return redirect('/nieuws');
    }
}
