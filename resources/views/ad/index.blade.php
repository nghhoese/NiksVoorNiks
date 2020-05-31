@extends ('layout')
@section('title')
    Advertenties
@endsection
@section ('stylesheets')
    <link rel="stylesheet" href="/CSS/pagination.css">
    <link rel="stylesheet" href="/CSS/ads.css">
@endsection
@section ('content')
    <div class="articles">
        <div class="filters">
            <form method="post" action="/advertenties">
                @csrf
                <label class="title" for="categorie">Categorie:</label><br>
                <select name="selectCategory" id="selectCategory">
                    <option value="{{$categorie ?? ''}}" selected>{{$categorie ?? 'Kies een categorie...'}}</option>
                    <option value="">Geen categorie</option>
                    @foreach($categories as $category)
                        <option name="selectedCategory" id="selectedCategory"
                                value="{{$category->naam}}">{{$category->naam}}</option>
                    @endforeach
                </select><br>
                <hr>
                <label class="title">Vraag en Aanbod:</label><br>
                @if(!empty($aangeboden) && !empty($gevraagd))
                    <input checked type="checkbox" id="gevraagd" name="gevraagd">
                    <label for="gevraagd">Gevraagd</label>
                    <input checked type="checkbox" id="aangeboden" name="aangeboden">
                    <label for="aangeboden">Aangeboden</label><br>
                @elseif(!empty($gevraagd))
                    <input checked type="checkbox" id="gevraagd" name="gevraagd">
                    <label for="gevraagd">Gevraagd</label>
                    <input type="checkbox" id="aangeboden" name="aangeboden">
                    <label for="aangeboden">Aangeboden</label><br>
                @elseif(!empty($aangeboden))
                    <input type="checkbox" id="gevraagd" name="gevraagd">
                    <label for="gevraagd">Gevraagd</label>
                    <input checked type="checkbox" id="aangeboden" name="aangeboden">
                    <label for="aangeboden">Aangeboden</label><br>
                @else
                    <input checked type="checkbox" id="gevraagd" name="gevraagd">
                    <label for="gevraagd">Gevraagd</label>
                    <input checked type="checkbox" id="aangeboden" name="aangeboden">
                    <label for="aangeboden">Aangeboden</label><br>
                @endif
                <hr>
                <label class="title" for="place">Plaats:</label><br>
                <select id="selectPlace" name="selectPlace">
                    <option value="{{$plaats ?? ''}}" selected>{{$plaats ?? 'Kies een plaats...'}}</option>
                    <option value="">Geen plaats</option>
                    @foreach($places as $place)
                        <option id="selectedPlace" value="{{$place->naam}}">{{$place->naam}}</option>
                    @endforeach
                </select><br>
                <hr>
                <label class="title">Prijs:</label><br>
                <div id="priceContainer">
                    <div class="slidecontainer">
                        <input type="range" min="1" max="100" value="{{ $minPrijs ?? '1'}}" class="slider" id="minPrice"
                               name="minPrice">
                        <p>Min: <span id="valueMin"></span> Niksen</p>
                    </div>
                    <div class="slidecontainer">
                        <input type="range" min="1" max="100" value="{{ $maxPrijs ?? '100'}}" class="slider"
                               name="maxPrice" id="maxPrice">
                        <p>Max: <span id="valueMax"></span> Niksen</p>
                    </div>
                    <div id="manualInputContainer">
                        <label for="minPrice">Vanaf:</label>
                        <input name="minPriceOld" id="minPriceOld" class="minPriceHand" value="{{ $minPrijs ?? '1'}}"
                               type="number" min="1" max="100">
                        <label for="maxPrice">T/M:</label>
                        <input name="maxPriceOld" id="maxPriceOld" class="maxPriceHand" value="{{ $maxPrijs ?? '100'}}"
                               type="number" min='1' max="100">
                        <input class="btn" type="submit" value="herlaad">
                        <br>
                    </div>
                    <a id="manualInput" class="btn" href="#">Handmatig invoeren</a>
                </div>
                <br>
                <input class="btn ss" type="submit" value="filter">
            </form>
            <a class="addad" href="advertentiePlaatsen">
                Klik hier om zelf een advertentie te plaatsen
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
        <div class="article-list">
            @foreach($advertenties as $advertentie)
                <a class="article" href="/advertentieDetails/{{ $advertentie->id }}" id="ad1">
                    <img src="{{$advertentie->foto ?? '\uploads\LM7EA7m.jpg'}}">
                    <div class="addetails">
                        <p class="adtype">
                            @if($advertentie->vraag == 0)
                                Aangeboden
                            @else
                                Gevraagd
                            @endif
                        </p><br>
                        <h3 class="adtitle">{{ $advertentie->titel }}</h3>
                        <p class="addescr">{{ $advertentie->beschrijving }}</p>
                        <i class="fa fa-map-marker-alt adloc"><label> {{$advertentie->plaats}}</label></i>
                        <label class="adprice" for="ad1">{{ $advertentie->prijs}} Niks</label>
                    </div>
                </a>
            @endforeach
            {{$advertenties->links("pagination::bootstrap-4")}}
        </div>
    </div>
@section('footer')
    <script src="/JS/adFilter.js"></script>
@endsection
@endsection
