@extends ('layout')
@section('title')
    Inbox
@endsection
@section ('stylesheets')
    <link rel="stylesheet" href="/CSS/profile.css">
@endsection
@section ('content')
    <div class="profile">
        <div class="profile-info">
            <img class="profile-img"
                 src="{{$user->foto ?? 'https://www.isarklinikum.de/en/wp-content/uploads/sites/3/2015/07/empty_avatar.jpg'}}">
            <div class="stats">
                <h1 id="title" class="title">{{$user->voornaam}} {{$user->tussenvoegsel}} {{$user->achternaam}}</h1>
            </div>
            <a href="/inbox/reageren/{{$user->email}}" class="btn">Bericht sturen</a>
            <div class="user-description">
                <b>Beschrijving <br/></b>
                <p>{{$user->beschrijving}}</p>
            </div>


            <div class="profile-advertisements">
                <div class="advertisements-description">
                    <b>Advertenties van {{$user->voornaam}}: <br/></b>
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
    </div>

@endsection
