@extends ('layout')
@section('title')
    Transacties
@endsection
@section ('stylesheets')
    <link rel="stylesheet" href="/CSS/pagination.css">
    <link rel="stylesheet" href="/CSS/payments.css">
@endsection
@section ('content')
    <div class="container">
        <h1 class="inbox-title">Transacties </h1>
        <h1 class="inbox-title">Balans: {{$user->niksen}} Niksen</h1>
        <div class="wrapper">
            <div class="inbox">
                <table id="table1">
                    <thead>
                    <tr>
                        <th>Betreft</th>
                        <th>Bedrag</th>
                        <th>Datum</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                                <td><a class="message-link" href="/transactie/{{$transaction->id}}">
                                        <p> {{$transaction->beschrijving}}</p></a></td>
                                @if($transaction->ontvanger_email == $user->email && $transaction->betaalverzoek == 0)
                                <td><a class="message-link" href="/transactie/{{$transaction->id}}">
                                        <p style="color:green;">+{{$transaction->bedrag}}</p></a></td>
                                @elseif($transaction->ontvanger_email == $user->email && $transaction->betaalverzoek == 1)
                                <td><a class="message-link" href="/transactie/{{$transaction->id}}">
                                        <p style="color:red;">-{{$transaction->bedrag}}</p></a></td>
                                @elseif($transaction->zender_email == $user->email && $transaction->betaalverzoek == 0)
                                <td><a class="message-link" href="/transactie/{{$transaction->id}}">
                                        <p style="color:red;">-{{$transaction->bedrag}}</p></a></td>
                                @elseif($transaction->zender_email == $user->email && $transaction->betaalverzoek == 1)
                                <td><a class="message-link" href="/transactie/{{$transaction->id}}">
                                        <p style="color:green;">+{{$transaction->bedrag}}</p></a></td>
                                @endif
                                <td><a class="message-link" href="/transactie/{{$transaction->id}}">
                                        <p>{{$transaction->datum}}</p></a></td>
                                <td><a class="message-link" href="/transactie/{{$transaction->id}}">
                                        <p>
                                        @if($transaction->geaccepteerd == 1)
                                        geaccepteerd
                                        @elseif($transaction->verstuurd == 1)
                                        verstuurd nog niet geaccepteerd
                                        @endif
                                        </p></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if(count($transactions) < 1)
                    <h3 style="text-align:center;">Je hebt nog geen transacties.</h3>
                @endif
                <div class="pagination1">
                </div>
                <a class="btn" href="/transacties/maken/nieuw">Nieuwe Transactie</a>
            </div>
        </div>
@endsection
