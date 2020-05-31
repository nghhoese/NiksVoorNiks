@extends ('layout')
@section('title')
    nieuw bericht
@endsection
@section ('stylesheets')
    <link rel="stylesheet" href="/CSS/message.css">
@endsection
@section ('content')
    <div class="card">
        <div class="card-header">
            <div class="title">
                <p>Nieuw Bericht</p>
            </div>
            <form method="post" action="/inbox/verzenden">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <strong style="color:red;">{{ $error }}</strong>
                        @endforeach
                    </div><br/>
                @endif
                <label><b>Ontvanger: </b></label><br>
                <select id="to" name="ontvanger">
                    <option value="{{$email ?? ''}}" selected>{{$email ?? 'Kies een ontvanger...'}}</option>
                    @foreach($recipients as $recipient)
                        <option
                            value="{{$recipient->email}}">{{$recipient->voornaam}} {{$recipient->tussenvoegsel}} {{$recipient->achternaam}}
                            ({{$recipient->email}})
                        </option>
                    @endforeach
                </select><br>
                <label><b>Onderwerp: </b></label><br>
                <input name="onderwerp" type="text" value="{{$title ?? ''}}"><br>
                <label><b>transactie nummer(betaalverzoek): </b></label><br>
                <input name="transactie" type="text"><br>
                <label for="bericht"><b>Bericht: </b></label><br>
                <textarea name="bericht" rows="15" cols="50">Beste {{$name ?? ''}},&#010;&#010;&#010;&#010;&#010;Met vriendelijke groet,&#010;&#010;{{$user->voornaam}}</textarea><br>
                <input type="submit" value="Verzend Bericht">
            </form>
            <div class="back">
                <a href="/inbox"><i class="fas fa-arrow-left">Terug naar inbox</i></a>
            </div>
        </div>
    </div>
@endsection
