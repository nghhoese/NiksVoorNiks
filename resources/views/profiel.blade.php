@extends ('layout')
@section('title')
    Profiel
@endsection
@section ('stylesheets')
    <link rel="stylesheet" href="/CSS/profile.css">
@endsection
@section ('content')
    <div class="wrapper">
        <div class="profile-info">
            <img class="profile-img"
                 src="{{$user->foto ?? 'https://www.isarklinikum.de/en/wp-content/uploads/sites/3/2015/07/empty_avatar.jpg'}}">
            <div class="stats">
                <h3 id="title" class="">{{$user->voornaam}} {{$user->tussenvoegsel}} {{$user->achternaam}}</h3>
            </div>
            <a href="/inbox/bericht/{{$user->email}}" class="btn">Bericht sturen</a>
            <div class="user-description">
                <b>Beschrijving <br/></b>
                <p>{{$user->beschrijving}}</p>
            </div>
        </div>
            <div class="profile-advertisements">
                <div class="advertisements-description">
                    <h3>Advertenties van {{$user->voornaam}}: <br/></h3>
                </div>
                @foreach($user->advertentie as $advertentie)
                    <div class="advertisement-float">
                        <div class="advertisements-description">
                            <p>{{$advertentie->titel}}</p>
                        </div>
                        <div class="advertisements-location"><p>{{$advertentie->postcode}}</p></div>
                        <a href="/advertentieDetails/{{$advertentie->id}}" class="btn">Bekijk advertentie</a>
                    </div>
                @endforeach
            </div>
    </div>
@endsection
