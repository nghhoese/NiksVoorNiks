<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transactie;
use App\Deelnemer;

class TransactionController extends Controller
{
    public function index($id){
        $user = auth()->user();
       $transaction = Transactie::find($id);
       if($transaction == null){
           return redirect('/');
       }
       return view('payment.view',['transaction' => $transaction,'user'=> $user]);
    }
    public function showAll(){
        $user = auth()->user();
        $transactions = Transactie::where('zender_email','=',$user->email)->orWhere('ontvanger_email','=',$user->email)->orderBy('datum','DESC')->get();
        return view('payment.payments',['transactions' => $transactions,'user'=>$user]);
    }
    public function create(){
        $recipients = Deelnemer::all();

        return view('payment.create',['recipients'=>$recipients]);
    }
    public function store(Request $request){

        $user = auth()->user();
        $validatedData = $request->validate([
            'ontvanger' => 'required',
        ]);
        $user1 = Deelnemer::find(request('ontvanger'));

        $transaction = new Transactie();

        if(request('ask') != null){
            $validatedData = $request->validate([
                'beschrijving' => 'required|max:50',
                'bedrag' => 'required|numeric|between:0,300',
                'ontvanger' => 'required',
            ]);
            $transaction->betaalverzoek = 1;
            $transaction->geaccepteerd = 0;
        }else{
            $balanceUser = $user->niksen;
            $balanceReceiver = $user1->niksen;
            if($balanceUser >= 0){
                $bedrag = $balanceUser + 150;
            }else{
                $bedrag = 150 - ($balanceUser * -1);

            }
            if($balanceReceiver >= 0){
                $bedrag1 = 150 - $balanceReceiver;
            }else{
                $bedrag1 = ($balanceReceiver * -1) + 150;

            }
            $validatedData = $request->validate([
                'beschrijving' => 'required|max:50',
                'bedrag' => 'required|numeric|between:0,'.min($bedrag,$bedrag1),
                'ontvanger' => 'required',
            ]);
            $transaction->betaalverzoek = 0;
            $transaction->geaccepteerd = 1;
            $user->niksen = $user->niksen - request('bedrag');
            $user1->niksen = $user1->niksen + request('bedrag');
            $user->save();
            $user1->save();
        }
        $transaction->ontvanger_email = request('ontvanger');
        $transaction->zender_email = $user->email;
        $transaction->verstuurd = 1;
        $transaction->datum = date("Y-m-d H:i:s");
        $transaction->bedrag = request('bedrag');
        $transaction->beschrijving = request('beschrijving');
        $transaction->save();
        return redirect('/transactie/'.$transaction->id);

    }
    public function accept($id){
        $user = auth()->user();
        $transaction = Transactie::find($id);
        $user1 = Deelnemer::find($transaction->zender_email);
        if($user->email == $transaction->ontvanger_email){
            $transaction->geaccepteerd = 1;
            $user->niksen = $user->niksen - $transaction->bedrag;
            $user1->niksen = $user1->niksen + $transaction->bedrag;
            $user->save();
            $user1->save();
            $transaction->save();
            return redirect('/transactie/'.$transaction->id);
        }
        return redirect('/transactie/'.$transaction->id);

    }


}
