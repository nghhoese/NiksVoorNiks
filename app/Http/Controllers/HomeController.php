<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informatie;
use App\Advertentie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $advertisements = Advertentie::all();
        $information = Informatie::where('naam', 'Hoofdpagina')->first();
        return view('home', ['information' => $information, 'advertisements' => $advertisements]);
    }

    public function overOns()
    {
        return view('overons');
    }
}
