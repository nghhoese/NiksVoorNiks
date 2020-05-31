@extends ('layout')
@section('title')
    Advertentie plaatsen
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
            <form id="form" method="post" action="/advertentiePlaatsen" enctype="multipart/form-data">
                @csrf
                <div class="plaatsAdvertentie1">
                    <h2>Nieuwe advertentie plaatsen</h2><br>
                    <label for="titel">Titel advertentie</label><br>
                    <input type="text" id="titel" name="titel"><br><br>
                    <label for="beschrijving">Beschrijving</label><br>
                    <textarea name="beschrijving" id="beschrijving" rows="15" cols="50"></textarea><br><br>
                </div>
                <div class="plaatsAdvertentie2">
                    <label for="category">Kies een rubriek</label><br>
                    <select id="category" name="category">
                        @foreach($categories as $category)
                            <option value="{{$category->naam}}">{{$category->naam}}</option>
                        @endforeach
                    </select><br><br>
                    <label>Soort advertentie:</label>
                    <select name="asked">
                        <option value="0">Aangeboden</option>
                        <option value="1">Gevraagd</option>
                    </select>
                    <br><br>
                    <label>Prijs type:</label>
                    <select name="price-type">
                        <option value="0">Vaste prijs</option>
                        <option value="1">Bieden</option>
                    </select>
                    <br><br>
                    <label for="prijs">Prijs(Niks)</label><br>
                    <input type="number" id="prijs" name="prijs" min="0" max="200">
                    <br><br>
                    <label for="location">Kies een locatie</label><br>
                    <select id="location" name="location">
                        @foreach($places as $place)
                            <option value="{{$place->naam}}">{{$place->naam}}</option>
                        @endforeach
                    </select><br><br>
                    <label for="img">Voeg eventueel een foto toe:</label><br>
                    <input type="file" name="file" class="form-control">
                    <br><br>
                    <input type="submit" value="Plaats advertentie">
                </div>
            </form>
        </div>
    </div>
@endsection
