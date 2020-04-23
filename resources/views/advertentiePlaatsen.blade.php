@extends ('layout')
@section('title')
    Advertentie plaatsen
@endsection
<link rel="stylesheet" href="/CSS/form.css">
<link rel="stylesheet" href="/CSS/postAdvertisement.css">
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
                <h2>Nieuwe advertentie plaatsen</h2><br><br>

                <label for="category">Kies een rubriek</label><br>
                <select id="category" name="category">
                    @foreach($categories as $category)
                        <option value={{$category->naam}}>{{$category->naam}}</option>
                    @endforeach
                </select><br><br>

                <label for="group">Kies een groep(optioneel)</label><br>
                <select id="group" name="group">
                    @foreach($groups as $group)
                        <option value={{$group->naam}}>{{$group->naam}}</option>
                    @endforeach
                </select><br><br>

                <label for="title">Titel advertentie</label><br>
                <input type="text" id="title" name="title"><br><br>

                <label for="beschrijving">Beschrijving</label><br>
                <textarea name="beschrijving" id="beschrijving" rows="15" cols="50"></textarea><br><br>

                <label for="price">Prijs(Niks)</label><br>
                <input type="number" id="price" name="price" min="0" max="200">
                <br><br>

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

                <label>Huisnummer:</label>
                <input name="housenumber" type="text">
                <br><br>

                <label for="img">Voeg eventueel een foto toe:</label><br>
                <input type="file" name="file" class="form-control">
                <br><br>

                <label for="locatie">Locatie(postcode)</label><br>
                <input type="text" id="locatie" name="locatie"><br><br>

                <input type="submit" value="Plaats advertentie">

            </form>
        </div>
    </div>
@endsection
