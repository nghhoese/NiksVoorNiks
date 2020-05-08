@extends ('layout')
@section('title')
    home
@endsection
@section ('stylesheets')
    <link rel="stylesheet" href="/CSS/pagination.css">
    <link rel="stylesheet" href="/CSS/advertenties.css">

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
                        <option name="selectedCategory" id="selectedCategory" value="{{$category->naam}}">{{$category->naam}}</option>
                    @endforeach
                </select><br>


                <label class="title">Vraag en Aanbod:</label><br>
                @if($gevraagd ?? null)
                @if($gevraagd == 1)
                <input checked type="radio" id="radio" value="1" name="radio">
                <label for="gevraagd">Gevraagd</label>

                <input type="radio" id="radio" value="0" name="radio">
                <label for="aangeboden">Aangeboden</label><br>
                <input type="radio" id="radio" value="" name="radio">
                <label for="aangeboden">Aangeboden en Gevraagd</label><br>
                @elseif($gevraagd == 0)
                <input type="radio" id="radio" value="1" name="radio">
                <label for="gevraagd">Gevraagd</label>

                <input checked type="radio" id="radio" value="0" name="radio">
                <label for="aangeboden">Aangeboden</label><br>

                <input type="radio" id="radio" value="" name="radio">
                <label for="aangeboden">Aangeboden en Gevraagd</label><br>

                @endif
                @else
                <input type="radio" id="radio" value="1" name="radio">
                <label for="gevraagd">Gevraagd</label>

                <input type="radio" id="radio" value="0" name="radio">
                <label for="aangeboden">Aangeboden</label><br>

                <input checked type="radio" id="radio" value="" name="radio">
                <label for="aangeboden">Aangeboden en Gevraagd</label><br>
                @endif
                <label class="title" for="place">Plaats:</label><br>
                <select id="selectPlace" name="selectPlace">
                    <option value="{{$plaats ?? ''}}" selected>{{$plaats ?? 'Kies een plaats...'}}</option>
                    <option value="">Geen plaats</option>
                    @foreach($places as $place)
                        <option id="selectedPlace" value="{{$place->naam}}">{{$place->naam}}</option>
                    @endforeach
                </select><br>


                <label class="title">Prijs:</label><br>
                <div class="slidecontainer">
                <input type="range" min="1" max="100" value="{{ $minPrijs ?? '1'}}" class="slider" id="minPrice" name="minPrice">
                 <p>Min: <span id="valueMin"></span> Niksen</p>
                </div>
                <div class="slidecontainer">
                <input type="range" min="1" max="100" value="{{ $maxPrijs ?? '100'}}" class="slider" name="maxPrice" id="maxPrice">
                <p>Max: <span id="valueMax"></span> Niksen</p>
                </div>



                <label class="title" for="groep">Groep:</label><br>
                <select id="selectGroup" name="selectGroup">
                    <option value="{{$groep ?? ''}}" selected>{{$groep ?? 'Kies een groep...'}}</option>
                    <option value="">Geen groep</option>
                    @foreach($groups as $group)
                        <option id="selectedGroup" value="{{$group->naam}}">{{$group->naam}}</option>
                    @endforeach
                </select><br>
            <input style="display:none;"class="btn"type="submit" value="filter">
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
                        <p class="adtype">


                            @if($advertentie->vraag == 0)
                                Aangeboden
                            @else
                                Gevraagd
                            @endif

                        </p><br>
                        <h3 class="adtitle">{{ $advertentie->titel }}</h3>
                        <p class="addescr">{{ $advertentie->beschrijving }}</p>
                        <i class="fa fa-map-marker adloc"><label>{{$advertentie->plaats}}</label></i>
                        <label class="adprice" for="ad1">{{ $advertentie->prijs}} Niks</label>
                    </div>
                </a>
            @endforeach
            {{$advertenties->links("pagination::bootstrap-4")}}
        </div>
    </div>


<script>
let radioButtons = document.querySelectorAll('#radio');

    radioButtons.forEach(function(item, index){
        item.addEventListener('click', function(event) {
        document.querySelector('.btn').click();
        });
    });


document.querySelector('#selectCategory').addEventListener('click', function(event) {
if(document.querySelector('#selectCategory').selectedIndex != 0){
    document.querySelector('.btn').click();
}
});
document.querySelector('#selectGroup').addEventListener('click', function(event) {
if(document.querySelector('#selectGroup').selectedIndex != 0){
    document.querySelector('.btn').click();
}
});
document.querySelector('#selectPlace').addEventListener('click', function(event) {
if(document.querySelector('#selectPlace').selectedIndex != 0){
    document.querySelector('.btn').click();
}
});
var slider = document.querySelector("#minPrice");
var output = document.querySelector("#valueMin");
output.innerHTML = slider.value;
slider.addEventListener('mouseup', function(event) {
    document.querySelector('.btn').click();
});
slider.oninput = function() {
  output.innerHTML = this.value;

}
var slider1 = document.querySelector("#maxPrice");
var output1 = document.querySelector("#valueMax");
output1.innerHTML = slider1.value;
slider1.addEventListener('mouseup', function(event) {
    document.querySelector('.btn').click();
});
slider1.oninput = function() {
  output1.innerHTML = this.value;

}
</script>



@endsection
