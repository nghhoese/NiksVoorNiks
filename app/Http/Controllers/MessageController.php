<?php

namespace App\Http\Controllers;

use App\Advertentie;
use App\Deelnemer;
use Illuminate\Http\Request;
use App\Bericht;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $messages = $user->Bericht1()->where('verwijderd_door_ontvanger', '=', 0)->orderBy('datum', 'desc')->paginate(15);
        return view('message.inbox', ['messages' => $messages, 'user' => $user]);
    }

    public function indexSend()
    {
        $user = auth()->user();

        $messages = $user->Bericht()->where('verwijderd_door_zender', '=', 0)->orderBy('datum', 'desc')->paginate(15);
        return view('message.send', ['messages' => $messages, 'user' => $user]);
    }

    public function indexSearch()
    {
        $user = auth()->user();
        $messages = $user->Bericht1()
            ->where('verwijderd_door_ontvanger', '=', 0)
            ->where(function ($query) {
                $query->where('zender_email', 'like', '%' . Request('search') . '%')
                    ->orWhere('onderwerp', 'like', '%' . Request('search') . '%');
            })->orderBy('datum', 'desc')
            ->paginate(15);
        return view('message.inbox', ['messages' => $messages, 'user' => $user]);
    }

    public function indexSendSearch()
    {
        $user = auth()->user();

        $messages = $user->Bericht()
            ->where('verwijderd_door_zender', '=', 0)
            ->where(function ($query) {
                $query->where('ontvanger_email', 'like', '%' . Request('search') . '%')
                    ->orWhere('onderwerp', 'like', '%' . Request('search') . '%');
            })->orderBy('datum', 'desc')
            ->paginate(15);

        return view('message.send', ['messages' => $messages, 'user' => $user]);
    }

    public function view($id)
    {
        $user = auth()->user();

        $message = Bericht::find($id);
        if($message == null){
            return redirect('/');
        }
        if($user->email != $message->zender_email && $user->email != $message->ontvanger_email){
            return redirect('/');
        }
        $message->gelezen = 1;
        $message->save();
        return view('message.view', ['message' => $message]);
    }

    public function viewSend($id)
    {
        $user = auth()->user();

        $message = Bericht::find($id);
        if($message == null){
            return redirect('/');
        }
        if($user->email != $message->zender_email && $user->email != $message->ontvanger_email){
            return redirect('/');
        }
        $message->gelezen = 1;
        $message->save();
        return view('message.viewSend', ['message' => $message]);


    }

    public function create()
    {
        $user = auth()->user();
        $recipients = Deelnemer::all();
        return view('message.create', ['user' => $user, 'recipients' => $recipients]);
    }

    public function reply($id)
    {
        $user = auth()->user();
        $recipients = Deelnemer::all();
        $advertisement = Advertentie::find($id);
        $title = $advertisement->titel;
        $email = $advertisement->deelnemer_email;
        $deelnemer = Deelnemer::find($email);
        $name = $deelnemer->voornaam;


        return view('message.create', ['email' => $email, 'title' => $title, 'name' => $name, 'user' => $user, 'recipients' => $recipients]);
    }

    public function message($id)
    {
        $recipients = Deelnemer::all();
        $user = auth()->user();
        $receiveremail = Deelnemer::find($id)->email;
        $receivername = Deelnemer::find($id)->voornaam;

        return view('message.create', ['user' => $user, 'recipients' => $recipients, 'email' => $receiveremail, 'name' => $receivername]);
    }

    public function search(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $employees = Deelnemer::orderby('voornaam', 'asc')->select('id', 'voornaam', 'tussenvoegsel', 'achternaam', 'email')->limit(5)->get();
        } else {
            $employees = Deelnemer::orderby('voornaam', 'asc')->select('id', 'voornaam', 'tussenvoegsel', 'achternaam', 'email')->where('voornaam', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($employees as $employee) {
            $response[] = array("value" => $employee->id, "label" => $employee->voornaam . " " . $employee->tussenvoegsel . " " . $employee->achternaam . " " . $employee->email);
        }

        return json_encode($response);

    }
    public function replyOnMessage($id)
    {

        $message = Bericht::find($id);
        $user = auth()->user();
        if($user->email != $message->zender_email && $user->email != $message->ontvanger_email){
            return redirect('/');
        }
        $recipients = Deelnemer::all();
        $user = auth()->user();
        return view('message.create', ['email' => $message->zender_email, 'title' => 'RE:' . $message->onderwerp, 'user' => $user, 'recipients' => $recipients]);
    }

    public function test()
    {
        return view('testsearch');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'onderwerp' => 'required|max:50',
            'bericht' => 'required|max:500',
            'ontvanger' => 'required',
            'transactie' => 'numeric|nullable',
        ]);
        $message = new Bericht();
        $message->inhoud = request('bericht');
        $message->onderwerp = request('onderwerp');
        $message->ontvanger_email = request('ontvanger');
        $message->zender_email = auth()->user()->email;
        $message->datum = date("Y-m-d H:i:s");
        $message->gelezen = 0;
        if(request('transactie') != null){
            $message->betaalverzoek_link = request('transactie');
        }
        $message->verwijderd_door_ontvanger = 0;
        $message->verwijderd_door_zender = 0;
        $message->save();
        return redirect('/inbox');
    }

    public function delete($id)
    {
        $user = auth()->user();
        $email = Bericht::find($id);
        if($user->email != $email->zender_email && $user->email != $email->ontvanger_email){
            return redirect('/');
        }
        if ($email->verwijderd_door_zender == 1) {
            $email->delete();
        } else {
            $email->verwijderd_door_ontvanger = 1;
            $email->save();
        }
        return redirect('/inbox');
    }

    public function deleteSend($id)
    {
        $user = auth()->user();
        $email = Bericht::find($id);
        if($user->email != $email->zender_email && $user->email != $email->ontvanger_email){
            return redirect('/');
        }
        if ($email->verwijderd_door_ontvanger == 1) {
            $email->delete();
        } else {
            $email->verwijderd_door_zender = 1;
            $email->save();
        }
        return redirect('/inbox/verzonden');
    }
}
