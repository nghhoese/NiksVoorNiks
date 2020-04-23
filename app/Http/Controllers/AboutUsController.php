<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informatie;

class AboutUsController extends Controller
{
    public function index()
    {

        $information = Informatie::where('naam', 'Overons')->first();
        return view('overons', ['information' => $information]);
    }
}
