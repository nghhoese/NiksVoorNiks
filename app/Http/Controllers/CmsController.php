<?php

namespace App\Http\Controllers;

use App\Informatie;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function index()
    {
        $information = Informatie::all();
        return view('admin.cms.index', ['information' => $information]);
    }

    public function overonsindex(){
        $information = Informatie::all();
        return view('admin.cms.overonsindex', ['information' => $information]);
    }

    public function contactindex(){
        $information = Informatie::all();
        return view('admin.cms.contactindex', ['information' => $information]);
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
