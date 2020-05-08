<?php

namespace App\Http\Controllers;

use App\Deelnemer;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($email)
    {
        $user = Deelnemer::where('email', '=', $email)->first();
        return view('profiel', ['user' => $user]);
    }


}
