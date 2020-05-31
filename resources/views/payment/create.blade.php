@extends ('layout')
@section('title')
nieuwe transactie
@endsection
@section ('stylesheets')
<link rel="stylesheet" href="/CSS/createPayment.css">
@endsection
@section ('content')
    <div class="card">
        <div class="card-header">
            <div class="title">
                <p>Nieuwe Transactie</p>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <strong style="color:red;">{{ $error }}</strong>
                        @endforeach
                </div><br/>
            @endif
            <form method="post" action="/transacties/maken/nieuw">
                @csrf
                <label><b>Ontvanger: </b></label><br>
                <select id="ontvanger" name="ontvanger">
                    <option value="" selected>Kies een ontvanger...</option>
                    @foreach($recipients as $recipient)
                        <option  value="{{$recipient->email}}">{{$recipient->voornaam}} {{$recipient->tussenvoegsel}} {{$recipient->achternaam}} ({{$recipient->email}})</option>
                    @endforeach
                </select><br>
                <label><b>Onderwerp: </b></label><br>
                <input name="beschrijving" type="text" value=""><br>
                <label><b>Bedrag: </b></label><br>
                <input name="bedrag" type="number" value=""><br>
                <label><b>Betaalverzoek: </b></label><br>
                <input name="ask" type="checkbox">
                <br>
                <input type="submit" value="Maak transactie">
            </form>
            <div class="back">
<a href="/transacties"><i class="fas fa-arrow-left">Terug naar transacties</i></a>
  </div>
        </div>
    </div>
@endsection
