@extends ('layout')
@section('title')
    Inbox
@endsection
@section ('stylesheets')

@endsection
@section ('content')
    <div class="flex-container">
        <div class="info">
            <img
                src="{{$user->foto ?? 'https://www.isarklinikum.de/en/wp-content/uploads/sites/3/2015/07/empty_avatar.jpg'}}">
            <div class="stats">
                <h1 id="title" class="title">{{$user->voornaam}} {{$user->tussenvoegsel}} {{$user->achternaam}}</h1>
            </div>
            <div class="description">
                <b>Beschrijving <br/></b>
                <p>{{$user->beschrijving}}</p>
            </div>

            <div class="main-content">
                @foreach($user->advertentie as $advertentie)
                    <img
                        src="{{$advertentie->foto ?? 'https://i.imgur.com/HxdPz7Q.jpg'}}">
                    <div class="locatie"><p>{{$advertentie->postcode}}</p></div>
                    <div class="Persoonsbeschrijving">
                        <p>{{$advertentie->titel}}</p>
                    </div>
                @endforeach
            </div>

        </div>


    </div>

@endsection
