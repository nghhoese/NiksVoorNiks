@extends ('layout')
@section('title')
    activiteit
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="/CSS/activiteitdetails.css">
@endsection
@section ('content')

    <div class="flex-container">
        <div class="main-content">
            <h1 id="title" class="title">{{$activiteit->titel}}</h1>
            <div class="stats">
                <div><p>{{$activiteit->postcode}}</p></div>
            </div>

        </div>

        <div class="info">
            <img
                src="{{$activiteit->deelnemer->foto ?? 'https://www.isarklinikum.de/en/wp-content/uploads/sites/3/2015/07/empty_avatar.jpg'}}">
            <div class="naam">
                <b id="name">{{$activiteit->deelnemer->voornaam}} {{$activiteit->deelnemer->tussenvoegsel}} {{$activiteit->deelnemer->achternaam}}</b>
            </div>
            <div class="Persoonsbeschrijving">
                <p>{{$activiteit->deelnemer->beschrijving}}</p>
            </div>
            <div>
                <a href="/profiel/{{$activiteit->deelnemer->email}}">
                    <button class="btn">Bekijk profiel</button>
                </a>
            </div>
            <input hidden id="email"{{$activiteit->deelnemer->email}}/>
        </div>
    </div>

@endsection
