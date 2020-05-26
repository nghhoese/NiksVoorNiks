<?php

namespace App\Http\Controllers;

use App\Activiteit;
use App\Bericht;
use App\Deelnemer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.panel');
    }

    public function userPanel()
    {
        $allUsers = Deelnemer::orderBy('voornaam', 'asc')->get();
        $newUsers = Deelnemer::where('rol_naam', '=', 'in_afwachting')->orderBy('voornaam', 'asc')->get();
        return view('admin.users.index', ['users' => $newUsers, 'allUsers' => $allUsers]);
    }

    public function edit($name)
    {
        $information = Informatie::find($name);

        return view('admin.cms.edit', ['information' => $information]);
    }

    public function update($name)
    {
        $information = Informatie::find($name);
        $information->titel = request('title');
        $information->informatie = request('info');

        $information->save();

        return redirect('/cms');
    }

    public function deleteUser($email)
    {
        $participant = Deelnemer::find($email);
        $participant->delete();
        return redirect('/users/index');
    }

    public function editUser($email)
    {
        $participant = Deelnemer::find($email);
        return view('admin.users.edit', ['user' => $participant]);
    }

    public function updateUser($email, Request $request)
    {
        $validatedData = $request->validate([
            'voornaam' => ['required', 'string', 'max:255'],
            'tussenvoegsel' => ['nullable', 'string', 'max:255'],
            'achternaam' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date', 'before:tomorrow'],
            'telefoonnummer' => ['required', 'string', 'max:25'],
            'postcode' => ['required', 'regex:/^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i'],
            'huisnummer' => ['required', 'string', 'max:25'],
            'niksen' => 'required|numeric|between:-150,150',
        ]);

        if (request('changedEmail')) {
            $validatedData = $request->validate([
                'email' => ['string', 'email', 'max:255', 'unique:deelnemer'],
            ]);
        }
        if (request('changedPassword')) {
            $validatedData = $request->validate([
                'wachtwoord' => ['string', 'min:8', 'confirmed'],
            ]);
        }

        $participant = Deelnemer::find($email);
        if (request('changedEmail')) {
            $participant->email = request('email');
        }
        if (request('changedPassword')) {
            $participant->wachtwoord = request('wachtwoord');
        }
        $participant->voornaam = request('voornaam');
        $participant->tussenvoegsel = request('tussenvoegsel');
        $participant->achternaam = request('achternaam');
        $participant->telefoonnummer = request('telefoonnummer');
        $participant->postcode = request('postcode');
        $participant->huisnummer = request('huisnummer');
        $participant->niksen = request('niksen');
        $participant->save();
        return redirect('/users/panel');
    }

    public function acceptUser($email)
    {
        $participant = Deelnemer::find($email);
        $participant->rol_naam = "deelnemer";
        $participant->save();
        return redirect('/users/index');
    }

    public function makeAdmin($email)
    {
        $participant = Deelnemer::find($email);
        $participant->rol_naam = "administrator";
        $participant->save();
        return redirect('/users/index');
    }

    public function removeAdmin($email)
    {
        $participant = Deelnemer::find($email);
        $participant->rol_naam = "deelnemer";
        $participant->save();
        return redirect('/users/index');
    }
}
