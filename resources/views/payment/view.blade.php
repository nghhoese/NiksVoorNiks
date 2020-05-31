@extends ('layout')
@section('title')
    bekijk
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="/CSS/transaction.css">
@endsection
@section ('content')
    <div class="transactionWrapper">
        <div class="paymentInfo">
            <h3>Transactie Nummer: {{$transaction->id}}</h3><br>
            <p>Transactie aangemaakt door: <strong>{{$transaction->zender_email}}</strong></p><br>
            <p>Transactie ontvanger: <strong>{{$transaction->ontvanger_email}}</strong></p><br>
            @if($transaction->betaalverzoek == 0)
                <p>Bedrag betaald door: {{$transaction->zender_email}}: <strong>{{$transaction->bedrag}} niksen</strong>
                </p><br>
            @elseif($transaction->geaccepteerd == 0)
                <p>Bedrag te betalen door {{$transaction->ontvanger_email}}: <strong> {{$transaction->bedrag}}
                        niksen</strong></p><br>
                <p>deze transactie is nog niet geaccepteerd door de ontvanger</p><br>
                <p>Als de ontvanger deze transactie accepteerd word het verzochte bedrag van zijn account
                    afgeschreven</p><br>
                @if($user->email == $transaction->ontvanger_email)
                    <a href="/transactie/accepteer/{{$transaction->id}}" class="btn">Accepteer transactie</a><br>
                @endif
            @else
                <p>Bedrag betaald door: {{$transaction->ontvanger_email}}: <strong>{{$transaction->bedrag}}
                        niksen</strong></p><br>
                <p>Transactie status: <strong>geaccepteerd</strong></p><br>
            @endif
            <p>Transactie beschrijving: <strong>{{$transaction->beschrijving}}</strong></p><br>
            <h3>Transactie Datum: {{$transaction->datum}}</h3>
        </div>
    </div>
@endsection
