@extends ('layout')
@section('title')
home
@endsection
@section('stylesheets')
<link rel="stylesheet" href="/CSS/advertentiedetails.css">
@endsection
@section ('content')



        <div class="flex-container">
            <div class="main-content">
                <h1 class="title">{{$advertentie->titel}}</h1>
                <div class="image-wrapper">
                <img src="{{$advertentie->foto ?? 'https://i.imgur.com/HxdPz7Q.jpg'}}">
                </div>
                <div class="stats">
                    <div><p>{{$advertentie->postcode}}</p></div>
                </div>
                <div class="description">
                    <b>Beschrijving <br/></b>
                    <p>{{$advertentie->beschrijving}}</p>
                </div>
            </div>

            <div class="info">
                <img src="{{$advertentie->deelnemer->foto ?? 'https://www.isarklinikum.de/en/wp-content/uploads/sites/3/2015/07/empty_avatar.jpg'}}">
                <div class="naam"><b>{{$advertentie->deelnemer->voornaam}} {{$advertentie->deelnemer->tussenvoegsel}} {{$advertentie->deelnemer->achternaam}}</b></div>
                <div class="locatie"><p>{{$advertentie->deelnemer->postcode}}</p></div>
                <div class="Persoonsbeschrijving">
                    <p>{{$advertentie->deelnemer->beschrijving}}</p>
                </div>
                <button class="btn">Koop nu voor 5 Niks!</button>
            </div>
        </div>









@endsection
