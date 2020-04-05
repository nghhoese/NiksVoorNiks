@extends ('layout')
@section('title')
home
@endsection
@section ('stylesheets')
<link rel="stylesheet" href="CSS/pagination.css">

@endsection
@section ('content')

<div class="articles">
    <div class="filters">
        <form>
            <label class="title" for="categorie">Categorie:</label><br>
            <select>
                <option value="" disabled selected hidden>Kies een categorie...</option>
                <option value="">Geen categorie</option>
                <option value="eten">Eten</option>
                <option value="techniek">Techniek</option>
            </select><br>


            <label class="title">Vraag en Aanbod:</label><br>
            <input type="checkbox" id="gevraagd" name="gevraagd">
            <label for="gevraagd">Gevraagd</label>

            <input type="checkbox" id="aangeboden" name="aangeboden">
            <label for="aangeboden">Aangeboden</label><br>


            <label class="title" for="locatie">Locatie:</label><br>
            <input type="text" id="locatie" name="locatie" placeholder="Typ hier een plaats of postcode..."><br>


            <label class="title">Prijs:</label><br>
            <label for="minprijs">Min.</label>
            <input type="number" id="minprijs" name="minprijs">

            <label for="maxprijs">Max.</label>
            <input type="number" id="maxprijs" name="maxprijs"><br>


            <label class="title" for="groep">Groep:</label><br>
            <select>
                <option value="" disabled selected hidden>Kies een groep...</option>
                <option value="">Geen groep</option>
                <option value="boxtel">Boxtel</option>
                <option value="rosmalen">Rosmalen</option>
                <option value="centrum">'s-Hertogenbosch Centrum</option>
            </select><br>

        </form>

        <a class="addad" href="advertentiePlaatsen">
            Klik hier om zelf een advertentie te plaatsen
            <i class="fa fa-arrow-right"></i>
        </a>
    </div>

    <div class="article-list">
    @foreach($advertenties as $advertentie)
        <a class="article" href="/advertentieDetails/{{ $advertentie->id }}" id="ad1">
            <img src="{{$advertentie->foto ?? 'https://i.imgur.com/LM7EA7m.jpg'}}">
            <div class="addetails">
                <p class="adtype">Aangeboden</p><br>
                <h3 class="adtitle">{{ $advertentie->titel }}</h3>
                <p class="addescr">{{ $advertentie->beschrijving }}</p>
                <i class="fa fa-map-marker adloc"><label> Rosmalen</label></i>
                <label class="adprice" for="ad1">{{ $advertentie->prijs}} Niks</label>
            </div>
        </a>
@endforeach
{{$advertenties->links("pagination::bootstrap-4")}}
    </div>
</div>






@endsection
