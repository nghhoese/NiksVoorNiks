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
        $message = Bericht::find($id);
        $message->gelezen = 1;
        $message->save();
        return view('message.view', ['message' => $message]);
    }

    public function viewSend($id)
    {
        $message = Bericht::find($id);
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
        $receiver = Deelnemer::find($id)->email;
        return view('message.create', ['user' => $user, 'recipients' => $recipients, 'email' => $receiver]);
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

    public function test()
    {
        return view('testsearch');
    }

    public function store()
    {
        $message = new Bericht();
        $message->inhoud = request('message');
        $message->onderwerp = request('subject');
        $message->ontvanger_email = request('to');
        $message->zender_email = auth()->user()->email;
        $message->datum = date("Y-m-d H:i:s");
        $message->gelezen = 0;
        $message->verwijderd_door_ontvanger = 0;
        $message->verwijderd_door_zender = 0;
        $message->save();
        return redirect('/inbox');
    }

    public function delete($id)
    {
        $email = Bericht::find($id);
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
        $email = Bericht::find($id);
        if ($email->verwijderd_door_ontvanger == 1) {
            $email->delete();
        } else {
            $email->verwijderd_door_zender = 1;
            $email->save();
        }
        return redirect('/inbox/verzonden');
    }
}
