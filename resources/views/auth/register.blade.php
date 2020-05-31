@extends('layout')
@section('stylesheets')
    <link rel="stylesheet" href="/CSS/register.css">
@endsection
@section('content')
    <div class="login-page">
        <div class="form">
            <form class="register-form">
                <input type="text" placeholder="Email adres"/>
                <p class="message">Al een account? <a href="/login">Log in</a></p>
            </form>
            <form class="login-form" role="form" method="POST" action="{{ url('/register') }}">
                @csrf
                <input id="firstname" placeholder="Voornaam" type="text"
                       class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                       value="{{ old('firstname') }}" required autofocus>
                @error('firstname')
                <span class="invalid-feedback" role="alert">
                <strong>{{ "Voornaam mag niet langer zijn dan 255 karakters" }}</strong>
                </span>
                @enderror
                <input id="affix" placeholder="Tussenvoegsel" type="text"
                       class="form-control @error('affix') is-invalid @enderror" name="affix"
                       value="{{ old('affix') }}">
                @error('affix')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ "Tussenvoegsel mag niet langer zijn dan 255 karakters " }}</strong>
                                    </span>
                @enderror
                <input id="lastname" placeholder="Achternaam" type="text"
                       class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                       value="{{ old('lastname') }}" required>
                @error('lastname')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ "Geboortedatum moet voor de datum van vandaag zijn" }}</strong>
                                    </span>
                @enderror
                <input type="date" id="dateofbirth" placeholder="Geboortedatum"
                       class="form-control @error('dateofbirth') is-invalid @enderror" name="dateofbirth"
                       value="{{ old('dateofbirth') }}" required>
                @error('dateofbirth')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <input type="tel" id="phonenumber" placeholder="Telefoonnummer"
                       class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber"
                       value="{{ old('phonenumber') }}" required>
                @error('phonenumber')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ "Telefoonnummer mag niet langer zijn dan 25 karakters" }}</strong>
                                    </span>
                @enderror
                <input id="postalcode" placeholder="Postcode" type="text"
                       class="form-control @error('postalcode') is-invalid @enderror" name="postalcode"
                       value="{{ old('postalcode') }}" required>
                @error('postalcode')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ "Postcode moet bestaan uit 4 cijfers en 2 letters" }}</strong>
                                    </span>
                @enderror
                <input id="housenumber" placeholder="Huisnummer" type="text"
                       class="form-control @error('housenumber') is-invalid @enderror" name="housenumber"
                       value="{{ old('housenumber') }}" required>
                @error('housenumber')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ "Huisnummer mag niet langer zijn dan 25 karakters" }}</strong>
                                    </span>
                @enderror
                <input id="email" placeholder="E-mailadres" type="email"
                       class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ "E-mailadres mag nog niet gebruikt zijn en mag niet langer zijn dan 255 karakters"  }}</strong>
                                    </span>
                @enderror
                <input id="password" type="password" placeholder="Wachtwoord"
                       class="form-control @error('password') is-invalid @enderror" name="password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ "Wachtwoorden moeten overeenkomen en moet minimaal uit 8 karakters bestaan"  }}</strong>
                                    </span>
                @enderror
                <input id="password_confirmation" type="password" placeholder="Wachtwoord bevestigen"
                       class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                       required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ "Wachtwoorden moeten overeenkomen en moet minimaal uit 8 karakters bestaan" }}</strong>
                                    </span>
                @enderror
                <button id="registerButton">Registeren</button>
            </form>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $('.message a').click(function () {
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
    </script>
@endsection
