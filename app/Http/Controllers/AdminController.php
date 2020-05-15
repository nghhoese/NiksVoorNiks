<?php

namespace App\Http\Controllers;

use App\Deelnemer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $newUsers = Deelnemer::all()->where('rol_naam', '=', 'in_afwachting');
        return view('admin.panel', ['users' => $newUsers]);
    }

    public function edit($name)
    {
        $information = Informatie::find($name);

        return view('admin.cms.edit', ['information' => $information]);
    }

    public function update($name)
    {
        $information = Informatie::find($name);
        $information->titel = request('title');
        $information->informatie = request('info');

        $information->save();

        return redirect('/cms');
    }
}
