@extends ('layout')
@section('title')
    Inbox
@endsection
@section ('stylesheets')
    <link rel="stylesheet" href="/CSS/pagination.css">
    <link rel="stylesheet" href="/CSS/inbox.css">
@endsection
@section ('content')
    <h1 class="inbox-title">Verzonden Berichten</h1>
    <form class="search-form" action="/inbox/verzonden/zoeken" method="POST">
        @csrf
        <input type="text" name="search" placeholder="onderwerpen/afzenders">
        <input type="submit" value="zoeken">
    </form>
    <div class="wrapper">
        <div class="inbox-menu">
            <h4>Menu</h4>
            <a href="/inbox"><p>Inbox({{count(Auth::user()->bericht1()->where('gelezen','=',0)->get())}})</p></a>
            <a href="/inbox/verzonden"><p>Verzonden Berichten</p></a>
            <a href="/inbox/nieuw"><p>Nieuw Bericht Maken <i class="fas fa-paper-plane" style="color: #66BB6A;"></i></p>
            </a>
        </div>
        <div class="inbox">
            <table id="table1">
                <thead>
                <tr>
                    <th></th>
                    <th>Verzonden naar</th>
                    <th>Onderwerp</th>
                    <th>Datum</th>
                    <th>Verwijderen</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td><a class="message-link" href="/inbox/viewSend/{{$message->id}}"><img class="profile-picture"
                                                                                                 src="{{$message->deelnemer()->find($message->ontvanger_email)->foto ?? 'https://www.isarklinikum.de/en/wp-content/uploads/sites/3/2015/07/empty_avatar.jpg'}}"></a>
                        </td>
                        <td><a class="message-link" href="/inbox/viewSend/{{$message->id}}">
                                <p> {{$message->ontvanger_email}}</p></a></td>
                        <td><a class="message-link" href="/inbox/viewSend/{{$message->id}}">
                                <p> {{$message->onderwerp}}</p></a></td>
                        <td><a class="message-link" href="/inbox/viewSend/{{$message->id}}"><p>{{$message->datum}} </p>
                            </a></td>
                        <td style="text-align:center;"><a href="/inbox/verwijder-verzonden/{{$message->id}}"><i
                                    class="fas fa-trash-alt" style="color:#66BB6A;"></i></a></td>
                    </tr>
                    </strong>
                @endforeach
                </tbody>
            </table>
            @if(count($messages) < 1)
                <h3 style="text-align:center;">Je hebt nog geen berichten verzonden! </h3>
            @endif
            <div class="pagination1">
                {{$messages->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>
@endsection
