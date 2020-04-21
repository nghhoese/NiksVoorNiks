<?php

namespace App\Http\Controllers;

use App\Deelnemer;
use Illuminate\Http\Request;
use App\Bericht;

class MessageController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $messages = $user->Bericht1()->paginate(15);
        return view('message.inbox', ['messages' => $messages, 'user' => $user]);
    }

    public function view($id)
    {
        $message = Bericht::find($id);
        return view('message.view', ['message' => $message]);

    }

    public function create()
    {
        return view('message.create');

    }

    public function respond($email)
    {
        $user = auth()->user();
        $deelnemer = Deelnemer::find($email);
        return view('message.create', ['user' => $user, 'deelnemer' => $deelnemer]);
    }

    public function reply()
    {
        $name = request('voornaam');

        return view('message.create', []);
    }

    public function store()
    {
        $message = new Bericht();
        $message->inhoud = request('message');
        $message->onderwerp = request('subject');
        $message->ontvanger_email = request('to');
        $message->zender_email = auth()->user()->email;
        $message->datum = date("Y-m-d H:i:s");
        $message->save();
        return redirect('/inbox');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
