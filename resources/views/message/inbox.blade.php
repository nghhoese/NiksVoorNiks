@extends ('layout')
@section('title')
    Inbox
@endsection
@section ('stylesheets')
    <link rel="stylesheet" href="/CSS/pagination.css">
    <link rel="stylesheet" href="/CSS/inbox.css">
@endsection
@section ('content')
    <div class="container">
        <h1 class="inbox-title">Inbox</h1>
        <form class="search-form" action="/inbox/zoeken" method="POST">
            @csrf
            <input type="text" name="search" placeholder="onderwerpen/afzenders">
            <input type="submit" value="zoeken">
        </form>
        <div class="wrapper">
            <div class="inbox-menu">
                <h4>Menu</h4>
                <a href="/inbox"><p>Inbox({{count(Auth::user()->bericht1()->where('gelezen','=',0)->get())}})</p></a>
                <a href="/inbox/verzonden"><p>Verzonden Berichten</p></a>
                <a href="/inbox/nieuw"><p>Nieuw Bericht Maken <i class="fas fa-paper-plane" style="color: #66BB6A;"></i>
                    </p></a>
            </div>
            <div class="inbox">
                <table id="table1">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Van</th>
                        <th>Onderwerp</th>
                        <th>Datum</th>
                        <th>Verwijderen</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        <tr>
                            @if($message->gelezen == 1)
                                <td><a class="message-link" href="/inbox/view/{{$message->id}}"><img
                                            class="profile-picture"
                                            src="https://www.isarklinikum.de/en/wp-content/uploads/sites/3/2015/07/empty_avatar.jpg"></a>
                                </td>
                                <td><a class="message-link" href="/inbox/view/{{$message->id}}">
                                        <p> {{$message->zender_email}}</p></a></td>
                                <td><a class="message-link" href="/inbox/view/{{$message->id}}">
                                        <p>{{$message->onderwerp}}</p></a></td>
                                <td><a class="message-link" href="/inbox/view/{{$message->id}}">
                                        <p>{{$message->datum}}</p></a></td>
                                <td style="text-align:center;"><a href="/inbox/verwijder/{{$message->id}}"><i
                                            class="fas fa-trash-alt" style="color:#66BB6A;"></i></a></td>
                            @else
                                <td><strong><a class="message-link" href="/inbox/view/{{$message->id}}"><img
                                                class="profile-picture"
                                                src="https://www.isarklinikum.de/en/wp-content/uploads/sites/3/2015/07/empty_avatar.jpg"></a>
                                </td>
                                <td><strong><a class="message-link" href="/inbox/view/{{$message->id}}">
                                            <p> {{$message->zender_email}}</p></a></td>
                                <td><strong><a class="message-link" href="/inbox/view/{{$message->id}}">
                                            <p>{{$message->onderwerp}}</p></a></td>
                                <td><strong><a class="message-link" href="/inbox/view/{{$message->id}}">
                                            <p>{{$message->datum}}</p></a></td>
                                <td style="text-align:center;"><a href="/inbox/verwijder/{{$message->id}}"><i
                                            class="fas fa-trash-alt" style="color:#66BB6A;"></i></a></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if(count($messages) < 1)
                    <h3 style="text-align:center;">Je hebt nog geen berichten! </h3>
                @endif
                <div class="pagination1">
                </div>
            </div>
        </div>
@endsection
