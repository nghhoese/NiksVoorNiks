@extends ('layout')
@section('stylesheets')
    <link rel="stylesheet" href="/CSS/userPanel.css">
@endsection
@section('title')
    Panel
@endsection
@section ('content')
    <div class="panel">
        <b>Nieuwe deelnemers</b>
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
                            <p>{{$user->voornaam}} {{$user->tussenvoegsel}} {{$user->achternaam}}</p>
                        </td>
                        <td>
                            <p>{{$user->email}}</p>
                        </td>
                        <td>
                            <p>{{$user->telefoonnummer}}</p>
                        </td>
                        <td style="text-align:center;"><a onclick="return confirm('Weet u het zeker?')" href="/panel/verwijder/{{$user->email}}"><i
                                    class="fas fa-trash-alt" style="color:#66BB6A;"></i></a>
                        </td>
                        <td style="text-align:center;"><a onclick="return confirm('Weet u het zeker?')" href="/panel/accepteren/{{$user->email}}"><i class="far fa-square" style="color:#66BB6A;"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(count($users) < 1)
                <h3 style="text-align:center;">Er zijn geen nieuwe deelnemers </h3>
            @endif
        </div>
    </div>
    <div class="panel2">
        <b>Alle deelnemers</b>
        <div class="inbox">
            <table id="table1">
                <thead>
                <tr>
                    <th>Naam</th>
                    <th>email</th>
                    <th>Telefoonnummer</th>
                    <th>Wijzigen</th>
                    <th>Verwijderen</th>
                    <th>Admin</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allUsers as $user)
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
                        <td style="text-align:center;"><a href="/panel/wijzig/{{$user->email}}"><i
                                    class="fas fa-edit" style="color:#66BB6A;"></i></a>
                        </td>
                        <td style="text-align:center;"><a onclick="return confirm('Weet u het zeker?')" href="/panel/verwijder/{{$user->email}}"><i
                                    class="fas fa-trash-alt" style="color:#66BB6A;"></i></a>
                        </td>
                        @if($user->rol_naam == "administrator")
                            <td style="text-align:center;"><a onclick="return confirm('Weet u het zeker?')" href="/panel/removeAdmin/{{$user->email}}"><i
                                        class="far fa-check-square" style="color:#66BB6A;"></i></a>
                            </td>
                        @else
                            <td style="text-align:center;"><a onclick="return confirm('Weet u het zeker?')" href="/panel/makeAdmin/{{$user->email}}"><i class="far fa-square" style="color:#66BB6A;"></i></a>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
