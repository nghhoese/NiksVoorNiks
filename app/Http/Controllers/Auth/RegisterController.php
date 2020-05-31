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
            'firstname' => ['required', 'string', 'max:255'],
            'affix' => ['nullable', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'dateofbirth' => ['required', 'date', 'before:tomorrow'],
            'phonenumber' => ['required', 'string', 'max:25'],
            'postalcode' =>['required', 'regex:/^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i'],
            'housenumber' =>['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:deelnemer'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
            'voornaam' => $data['firstname'],
            'tussenvoegsel' => $data['affix'],
            'geboortedatum' => $data['dateofbirth'],
            'telefoonnummer' => $data['phonenumber'],
            'postcode' => $data['postalcode'],
            'huisnummer' => $data['housenumber'],
            'rol_naam' => 'in_afwachting',
            'achternaam' => $data['lastname'],
            'niksen' => 0,
            'beschrijving' => '',
            'email' => $data['email'],
            'wachtwoord' => Hash::make($data['password']),
        ]);
    }
}
