<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bericht;

class MessageController extends Controller
{

    public function index(){
        $user = auth()->user();
        $messages = $user->Bericht1()->orderBy('datum','DESC')->paginate(15);
        return view('message.inbox',['messages' => $messages,'user' => $user]);
    }
    public function indexSend(){
        $user = auth()->user();
        $messages = $user->Bericht()->orderBy('datum','DESC')->paginate(15);
        return view('message.send',['messages' => $messages,'user' => $user]);
    }
    public function view($id){
        $message = Bericht::find($id);
        $message->gelezen = 1;  
        $message->save();
        return view('message.view',['message'=> $message]);

    }
    public function create(){

        return view('message.create');
    }
    public function store(){
        $message = new Bericht();
        $message->gelezen = 0;
        $message->inhoud = request('message');
        $message->onderwerp = request('subject');
        $message->ontvanger_email = request('to');
        $message->zender_email = auth()->user()->email;
        $message->datum = date("Y-m-d H:i:s");
        $message->save();
        return redirect('/inbox');
    }
    public function edit(){

    }
    public function update(){

    }
    public function delete($id){
        $message = Bericht::find($id);
        $message->delete();
        return redirect('/inbox');

    }
}