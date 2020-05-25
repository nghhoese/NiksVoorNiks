@extends ('layout')
@section('title')
    Deelnemer bewerken
@endsection
@section ('stylesheets')
    <link rel="stylesheet" href="/CSS/userEdit.css">
@endsection
@section ('content')
    <div class="plaatsadvertentie">
        <div class="createForm">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form id="form" method="post" action="/users/wijzigen/{{$user->email}}" enctype="multipart/form-data">
                @csrf
                <div class="plaatsAdvertentie1">
                    <h2>Deelnemer bewerken</h2><br>
                    <label>Voornaam</label><br>
                    <input type="text" id="voornaam" name="voornaam" value="{{$user->voornaam}}"><br>
                    <label>Tussenvoegsel</label><br>
                    <input type="text" id="tussenvoegsel" name="tussenvoegsel"
                           value="{{$user->tussenvoegsel ?? ''}}"><br>
                    <label>Achternaam</label><br>
                    <input type="text" id="achternaam" name="achternaam" value="{{$user->achternaam}}"><br>
                    <label>E-mailadress</label><br>
                    <input type="text" id="email" name="email" value="{{$user->email}}">
                    <input type="checkbox" id="changedEmail" name="changedEmail">Email gewijzigd
                    <br>
                    <label>Wachtwoord</label><br>
                    <input type="text" id="wachtwoord" name="wachtwoord" value="">
                    <input type="checkbox" id="changedPassword" name="changedPassword">Wachtwoord gewijzigd
                    <br>
                </div>
                <div>
                    <label>Telefoonnummer</label><br>
                    <input type="text" id="telefoonnummer" name="telefoonnummer" value="{{$user->telefoonnummer}}"><br>
                    <label for="date">Kies een datum</label><br>
                    <input type="date" id="date"
                           class="form-control" name="date"
                           value="{{$user->geboortedatum}}" required>
                    @error('dateofbirth')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <br>
                    <label>Postcode</label><br>
                    <input type="text" id="postcode" name="postcode" value="{{$user->postcode}}">
                    <label>Huisnummer</label><br>
                    <input type="text" id="huisnummer" name="huisnummer" value="{{$user->huisnummer}}">
                    <label>Niksen</label><br>
                    <input type="number" min="-150" max="150" id="niksen" name="niksen" value="{{$user->niksen}}">
                    <br> <br>
                    <input type="submit" value="Wijzigingen opslaan">
                    <br>
                </div>
                <br>
            </form>
        </div>
    </div>
@endsection
