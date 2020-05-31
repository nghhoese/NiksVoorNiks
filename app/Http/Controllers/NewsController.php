<?php

namespace App\Http\Controllers;

use App\Nieuws;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function showAll()
    {
        $nieuwsitems = Nieuws::orderby('id', 'desc')->paginate(4);
        return view('news.index', ['nieuws' => $nieuwsitems]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:255',
            'img' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $nieuws = new Nieuws();
        if ($request->file != null) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $request->file->move(public_path('uploads'), $fileName);
            $nieuws->foto = "/uploads/" . $fileName;
        }
        $nieuws->naam = request('title');
        $nieuws->beschrijving = request('description');
        $nieuws->save();
        return redirect('/nieuws');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:500',
            'img' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $nieuws = Nieuws::find($id);
        $nieuws->naam = request('title');
        $nieuws->beschrijving = request('description');
        $nieuws->save();
        return redirect('/nieuws');
    }

    public function edit($id)
    {
        $nieuws = Nieuws::find($id);
        return view('news.edit', ['nieuws' => $nieuws]);

    }

    public function view($id)
    {
        $nieuws = Nieuws::find($id);
        return view('news.view', ['news' => $nieuws]);
    }

    public function delete($id){
        $news = Nieuws::find($id);
        $news->delete();
        return redirect('/nieuws');
    }
}
