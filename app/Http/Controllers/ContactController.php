<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Informatie;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        $information = Informatie::where('naam', 'Contact')->first();
        return view('contact', ['contacts' => $contacts], ['information' => $information]);
    }
}
