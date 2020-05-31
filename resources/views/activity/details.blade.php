@extends ('layout')
@section('title')
    activiteit
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="/CSS/activityDetails.css">
    <link rel="stylesheet" href="/CSS/activity.css">
    <link rel="stylesheet" href="/CSS/activityPanel.css">
@endsection
@section ('content')
    <div class="flex-container">
        <div class="main-content">
            <h1 id="title" class="title">{{$activity->naam}}</h1>
            <div class="stats">
                <p>{{$activity->beschrijving}}</p>
                <br>
                <label class="activity-date">{{$activity->datum}}</label>
            </div>
            <br>
            <p>Beschikbare plekken: {{$activity->max_deelnemers - $participants}}</p>
            <p>{{$participants}} / {{$activity->max_deelnemers}}</p>
            <p style="color:red;">{{$error ?? ''}}</p>
            @if($activity->deelnemer()->find($user->email) == null)
                <a href="/activiteit/deelnemen/{{$activity->id}}">
                    <button class="btn">Deelnemen</button>
                </a>
            @else
                <p>U neemt al deel aan de activiteit</p>
            @endif
            @if(Auth::check() && auth()->user()->isAdmin())
                <a href="/activiteit/aanpassen/{{$activity->id}}"><i
                        class="btn">Aanpassen</i></a>
            @endif
        </div>
    @if(Auth::check() && auth()->user()->isAdmin())
            <div class="panel">
                <b>Ingeschreven deelnemers</b>
                <div class="participants">
                    <table id="participantsTable">
                        <thead>
                        <tr>
                            <th>Naam</th>
                            <th>email</th>
                            <th>Telefoonnummer</th>
                            <th>Verwijderen</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <p>{{$user->voornaam}} {{$user->tussenvoegsel}} {{$user->achternaam}}</p>
                                </td>
                                <td>
                                    <p>{{$user->email}}</p>
                                </td>
                                <td>
                                    <p>{{$user->telefoonnummer}}</p>
                                </td>
                                <td style="text-align:center;"><a href="/activiteit/deelnemer/verwijderen/{{$activity->id}}/{{$user->email}}"><i
                                            class="fas fa-trash-alt" style="color:#66BB6A;"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if($participants < 1)
                        <h3 style="text-align:center;">Er zijn geen deelnemers ingeschreven voor deze activiteit </h3>
                    @endif
                </div>
            </div>
        </div>
    @endif
@endsection
