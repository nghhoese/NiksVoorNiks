<?php

namespace App\Http\Controllers;

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
        return view('admin.users.panel', ['users' => $newUsers, 'allUsers' => $allUsers]);
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
        return redirect('/users/panel');
    }

    public function editUser($email)
    {
        $participant = Deelnemer::find($email);
        return view('admin.users.edit', ['user' => $participant]);
    }

    public function acceptUser($email)
    {
        $deelnemer = Deelnemer::find($email);
        $deelnemer->rol_naam = "deelnemer";
        $deelnemer->save();
        return redirect('/users/panel');
    }

    public function makeAdmin($email)
    {
        $deelnemer = Deelnemer::find($email);
        $deelnemer->rol_naam = "administrator";
        $deelnemer->save();
        return redirect('/users/panel');
    }

    public function removeAdmin($email)
    {
        $deelnemer = Deelnemer::find($email);
        $deelnemer->rol_naam = "deelnemer";
        $deelnemer->save();
        return redirect('/users/panel');
    }
}
