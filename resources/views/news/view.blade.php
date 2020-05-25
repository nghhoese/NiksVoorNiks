@extends ('layout')
@section('title')
    nieuwsbericht
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="/CSS/adDetails.css">
@endsection
@section ('content')
    <div class="flex-container">
        <div class="main-content">
            <h1 id="title" class="title">{{$news->naam}}</h1>
            <img src="{{$news->foto ?? 'https://i.imgur.com/HxdPz7Q.jpg'}}">
            <div class="description">
                <b>Beschrijving <br/></b>
                <p style="white-space: pre-line">{{$news->beschrijving}}</p>
            </div>
            <div class="info">
                <div>
                @if(Auth::check())
                    <a href="/nieuws/wijzigen/{{ $news->id }}" class="btn">Wijzigen</a>
                    <a href="/nieuws/verwijderen/{{ $news->id }}" class="btn">Verwijderen</a>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection
