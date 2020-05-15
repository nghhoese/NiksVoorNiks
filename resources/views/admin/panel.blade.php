@extends ('layout')
@section('stylesheets')
    <link rel="stylesheet" href="CSS/panel.css">
@endsection
@section('title')
    Panel
@endsection
@section ('content')


    <div class="panel">
        <b>Nieuwe deelnemers</b>
        <br>
        <br>
        @foreach($users as $user)
            <div class="participant">
                <p>{{$user->voornaam}}</p>
                <a class="btn" href="/panel/accepteren/{{$user->email}}">Accepteren</a>
            </div>
            <br>
        @endforeach

        <div class="inbox">
            <table id="table1">
                <thead>
                <tr>
                    <th>Naam</th>
                    <th>email</th>
                    <th>Telefoonnummer</th>
                    <th>Verwijderen</th>
                    <th>Accepteren</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <td>
                            <div class="participant">
                                <p>{{$user->voornaam}}</p>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            @if(count($users) < 1)
                <h3 style="text-align:center;">Er zijn geen nieuwe deelnemers </h3>
            @endif
            <div class="pagination1">

            </div>
        </div>
    </div>

@endsection
