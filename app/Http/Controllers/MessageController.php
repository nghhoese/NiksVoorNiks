<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bericht;

class MessageController extends Controller
{

    public function index(){
        $user = auth()->user();
        $messages = $user->Bericht1()->paginate(1);
        return view('message.inbox',['messages' => $messages,'user' => $user]);
    }
    public function view($id){
        $message = Bericht::find($id);
        return view('message.view',['message'=> $message]);

    }
    public function create(){

    }
    public function store(){

    }
    public function edit(){

    }
    public function update(){

    }
    public function delete(){

    }
}
