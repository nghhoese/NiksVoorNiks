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
            <form id="form" method="post" action="/nieuws/nieuw" enctype="multipart/form-data">
                @csrf
                <div class="plaatsAdvertentie1">
                    <h2>Nieuw nieuwsbericht plaatsen</h2><br>
                    <label for="title">Titel nieuwsbericht</label><br>
                    <input type="text" id="title" name="title"><br><br>
                    <label for="description">Beschrijving</label><br>
                    <textarea name="description" id="description" rows="15" cols="50"></textarea><br><br>
                </div>
                <div class="plaatsAdvertentie2">
                    <br><br>
                    <label for="img">Voeg eventueel een foto toe:</label><br>
                    <input type="file" name="file" class="form-control">
                    <br><br>
                    <input type="submit" value="Plaats nieuwsbericht">
                </div>
            </form>
        </div>
    </div>
@endsection
