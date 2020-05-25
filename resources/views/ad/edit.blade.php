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
            <form id="form" method="post" action="/advertentie/wijzigen/{{$ad->id}}" enctype="multipart/form-data">
                @csrf
                <div class="plaatsAdvertentie1">
                    <h2>Advertentie Wijzigen</h2><br>
                    <label for="titel">Titel advertentie</label><br>
                    <input type="text" id="titel" name="titel" value="{{$ad->titel}}"><br><br>
                    <label for="beschrijving">Beschrijving</label><br>
                    <textarea value="{{$ad->beschrijving}}" name="beschrijving" id="beschrijving" rows="15"
                              cols="50">{{$ad->beschrijving}}</textarea><br><br>
                </div>
                <div class="plaatsAdvertentie2">
                    <label for="category">Wijzig rubriek</label><br>
                    <select id="category" name="category">
                        <option checked value="{{$ad->categorie}}">{{$ad->categorie}}</option>
                        @foreach($categories as $category)
                            <option value={{$category->naam}}>{{$category->naam}}</option>
                        @endforeach
                    </select><br><br>
                    <label>Soort advertentie:</label>
                    <select name="asked">
                        @if($ad->vraag == 1)
                            <option value="0">Aangeboden</option>
                            <option checked value="1">Gevraagd</option>
                        @else
                            <option checked value="0">Aangeboden</option>
                            <option value="1">Gevraagd</option>
                        @endif
                    </select>
                    <br><br>
                    <label>Prijs type:</label>
                    <select name="price-type">
                        @if($ad->bieden == 1)
                            <option value="0">Vaste prijs</option>
                            <option checked value="1">Bieden</option>
                        @else
                            <option checked value="0">Vaste prijs</option>
                            <option value="1">Bieden</option>
                        @endif
                    </select>
                    <br><br>
                    <label for="prijs">Prijs(Niks)</label><br>
                    <input type="number" value="{{$ad->prijs}}" id="prijs" name="prijs" min="0" max="200">
                    <br><br>
                    <label for="location">Wijzig locatie</label><br>
                    <select id="location" name="location">
                        <option checked value="{{$ad->plaats}}">{{$ad->plaats}}</option>
                        @foreach($places as $place)
                            <option value={{$place->naam}}>{{$place->naam}}</option>
                        @endforeach
                    </select><br><br>
                    <label for="img">wijzig eventueel de foto:</label><br>
                    <input type="file" name="file" class="form-control">
                    <img style="width:400px;" src="{{$ad->foto}}">
                    <br><br>
                    <input type="submit" value="Advertentie Wijzigen">
                </div>
            </form>
        </div>
    </div>
@endsection
