@extends ('layout')
@section('title')
    advertentie
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="/CSS/advertentiedetails.css">
@endsection
@section ('content')

    <div class="flex-container">
        <div class="main-content">

            <h1 id="title" class="title">{{$advertentie->titel}} , {{$advertentie->prijs}} Niksen</h1>
            <img src="{{$advertentie->foto ?? 'https://i.imgur.com/HxdPz7Q.jpg'}}">
            <div class="stats">
                <div><p>{{$advertentie->postcode}}</p></div>
            </div>
            <div class="description">
                <b>Beschrijving <br/></b>
                <p style="white-space: pre-line">{{$advertentie->beschrijving}}</p>
            </div>
            <a href="/inbox/reply/{{$advertentie->id}}">
                <button class="btn">Reageer op advertentie</button>
            </a>
            @if($email == $advertentie->deelnemer_email)
                <a href="/advertentie/wijzigen/{{$advertentie->id}}"class="btn">Aanpassen</a>
                @if(Auth::check() && ((auth()->user()->isAdmin()) || (auth()->user()->email == $advertentie->deelnemer->email)))
                    <a href="/advertentie/verwijderen/{{$advertentie->id}}">
                        <button class="btn">Verwijderen</button>
                    </a>
                @endif            @endif

        </div>

        <div class="info">
            <img
                src="{{$advertentie->deelnemer->foto ?? 'https://www.isarklinikum.de/en/wp-content/uploads/sites/3/2015/07/empty_avatar.jpg'}}">
            <div class="naam">
                <b id="name">{{$advertentie->deelnemer->voornaam}} {{$advertentie->deelnemer->tussenvoegsel}} {{$advertentie->deelnemer->achternaam}}</b>
            </div>
            <div class="Persoonsbeschrijving">
                <p>{{$advertentie->deelnemer->beschrijving}}</p>
            </div>
            <div>
                <a href="/profiel/{{$advertentie->deelnemer->email}}">
                    <button class="btn">Bekijk profiel</button>
                </a>
            </div>
            <input hidden id="email"{{$advertentie->deelnemer->email}}/>
        </div>
    </div>

@endsection
