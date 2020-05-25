@extends ('layout')
@section('title')
    Nieuwsbericht plaatsen
@endsection
@section ('stylesheets')
    <link rel="stylesheet" href="/CSS/createAd.css">
@endsection
@section ('content')
    <div class="plaatsadvertentie">
        <div class="createForm">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form id="form" method="post" action="/nieuws/wijzigen/{{$nieuws->id}}" enctype="multipart/form-data">
                @csrf
                <div class="plaatsAdvertentie1">
                    <h2>Nieuwsbericht Wijzigen</h2><br>
                    <label for="title">Titel nieuwsbericht</label><br>
                    <input type="text" id="title" name="title" value="{{$nieuws->naam}}"><br><br>
                    <label for="beschrijving">Beschrijving</label><br>
                    <textarea value="{{$nieuws->beschrijving}}" name="description" id="desription" rows="15" cols="50">{{$nieuws->beschrijving}}</textarea><br><br>
                </div>
                <div class="plaatsAdvertentie2">
                    <label for="img">wijzig eventueel de foto:</label><br>
                    <input type="file" name="file" class="form-control">
                    <img style="width:400px;"src="{{$nieuws->foto ?? 'https://i.imgur.com/LM7EA7m.jpg'}}">
                    <br><br>
                    <input type="submit" value="Nieuwsbericht Wijzigen">
                </div>
            </form>
        </div>
    </div>
@endsection
