@extends ('layout')
@section('title')
    activiteit
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="/CSS/activityDetails.css">
    <link rel="stylesheet" href="/CSS/activity.css">
@endsection
@section ('content')

    <div class="flex-container">
        <div class="main-content">
            <h1 id="title" class="title">{{$activity->naam}}</h1>
            <div class="stats">
                <p>{{$activity->beschrijving}}</p>
                <br>
                <br>
                <label class="activity-date">{{$activity->datum}}</label>
            </div>
        </div>
    </div>

    <div class="flex-container">
        <div class="main-content">
            <p>Beschikbare plekken: {{$activity->max_deelnemers - $participants}}</p>
            <p>{{$participants}} / {{$activity->max_deelnemers}}</p>
            @if($activity->deelnemer()->find($user->email) == null)
                <a href="/activiteit/deelnemen/{{$activity->id}}">
                    <button class="btn">Deelnemen</button>
                </a>
            @else
                <p>U neemt al deel aan de activiteit</p>
            @endif
        </div>
    </div>

    {{--        <div class="info">--}}
    {{--            <div class="naam">--}}
    {{--                <b id="name">{{$advertentie->deelnemer->voornaam}} {{$advertentie->deelnemer->tussenvoegsel}} {{$advertentie->deelnemer->achternaam}}</b>--}}
    {{--            </div>--}}
    {{--            <div class="Persoonsbeschrijving">--}}
    {{--                <p>{{$advertentie->deelnemer->beschrijving}}</p>--}}
    {{--            </div>--}}
    {{--            <div>--}}
    {{--                <a href="/profiel/{{$advertentie->deelnemer->email}}">--}}
    {{--                    <button class="btn">Bekijk profiel</button>--}}
    {{--                </a>--}}
    {{--            </div>--}}
    {{--            <input hidden id="email"{{$advertentie->deelnemer->email}}/>--}}
    {{--        </div>--}}

@endsection
