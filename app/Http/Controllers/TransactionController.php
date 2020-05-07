<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transactie;

class TransactionController extends Controller
{
    public function index($id){
        $user = auth()->user();
       $transaction = Transactie::find($id);
       return view('payment.view',['transaction' => $transaction,'user'=> $user]);
    }
    public function showAll(){
        
    }
    public function create(){

    }
    public function store(){

    }
    public function edit(){

    }
    public function update(){

    }


}
