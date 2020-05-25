<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('admin.category.index', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'categorie' => ['required', 'max:100', 'string', 'unique:categorie,naam'],
        ]);
        $category = new Categorie();
        $category->naam = request('categorie');
        $category->save();
        return redirect('/categorie');
    }

    public function delete($name)
    {
        $category = Categorie::find($name);
        if (count($category->advertentie) > 0) {
            $error = 'Er zijn advertenties die gebruik maken van deze categorie.';
            $categories = Categorie::all();
            return view('admin.category.index', ['categories' => $categories, 'error' => $error]);
        }
        $category->delete();
        return redirect('/categorie');
    }
}
