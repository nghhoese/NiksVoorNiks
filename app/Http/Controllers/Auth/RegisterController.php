<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Deelnemer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Deelnemer::create([
            'voornaam' => $data['voornaam'],
            'tussenvoegsel' => $data['tussenvoegsel'],
            'geboortedatum' => $data['geboortedatum'],
            /*->format('Y-m-d')*/
            'telefoonnummer' => $data['telefoonnummer'],
            'postcode' => $data['postcode'],
            'huisnummer' => $data['huisnummer'],
            'rol_naam' => $data['rol_naam'],
            'achternaam' => $data['achternaam'],
            'niksen' => 0,
            'beschrijving' => '',
            'email' => $data['email'],
            'wachtwoord' => Hash::make($data['wachtwoord']),
        ]);
    }
}
