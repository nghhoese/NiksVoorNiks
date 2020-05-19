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
                
               
             
               

                <label class="title" for="place">Plaats:</label><br>
                <select id="selectPlace" name="selectPlace">
                    <option value="{{$plaats ?? ''}}" selected>{{$plaats ?? 'Kies een plaats...'}}</option>
                    <option value="">Geen plaats</option>
                    @foreach($places as $place)
                        <option id="selectedPlace" value="{{$place->naam}}">{{$place->naam}}</option>
                    @endforeach
                </select><br>


                <label class="title">Prijs:</label><br>
                <div id="priceContainer">
                <div class="slidecontainer">
                <input type="range" min="1" max="100" value="{{ $minPrijs ?? '1'}}" class="slider" id="minPrice" name="minPrice">
                 <p>Min: <span id="valueMin"></span> Niksen</p>
                </div>
                <div class="slidecontainer">
                <input type="range" min="1" max="100" value="{{ $maxPrijs ?? '100'}}" class="slider" name="maxPrice" id="maxPrice">
                <p>Max: <span id="valueMax"></span> Niksen</p>
                </div>
                
              
                <div id="manualInputContainer">
                <label for="minPrice">Vanaf:</label>
                <input name="minPriceOld" id="minPriceOld" class="minPriceHand" value="{{ $minPrijs ?? '1'}}" type="number" min="1" max="100">
                <label for="maxPrice">T/M:</label>
                <input name="maxPriceOld" id="maxPriceOld" class="maxPriceHand"value="{{ $maxPrijs ?? '100'}}" type="number" min='1'max="100">
                <input class="btn"type="submit" value="herlaad">
                <br>
               </div>
               <a id="manualInput" href="#">Handmatig invoeren</a>
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
document.querySelector('#manualInputContainer').hidden = true;
document.querySelector('#manualInput').addEventListener('click', function(event) {
    let minPrice = document.querySelector('#minPrice');
            let maxPrice = document.querySelector('#maxPrice');
    if(document.querySelector('#manualInput').innerHTML == 'Handmatig invoeren'){
        let minPrice = document.querySelector('#minPrice');
            let maxPrice = document.querySelector('#maxPrice');
        document.querySelectorAll('.slidecontainer').forEach(function(item,index){
            
            minPrice.id = 'minPriceOld';
            minPrice.name = 'minPriceOld';
            maxPrice.id = 'maxPriceOld';
            maxPrice.name = 'maxPriceOld';
            item.hidden = true;
        })
        let minPriceHand = document.querySelector('.minPriceHand');
        let maxPriceHand = document.querySelector('.maxPriceHand');
        minPriceHand.id = 'minPrice';
            minPriceHand.name = 'minPrice';
            maxPriceHand.id = 'maxPrice';
            maxPriceHand.name = 'maxPrice';
            document.querySelector('#manualInputContainer').hidden = false;

    document.querySelector('#manualInput').innerHTML = 'Instellen met slider';
     

    }else{
        let minPriceHand = document.querySelector('.minPriceHand');
        let maxPriceHand = document.querySelector('.maxPriceHand');
        minPriceHand.id = 'minPriceOld';
            minPriceHand.name = 'minPriceOld';
            maxPriceHand.id = 'maxPriceOld';
            maxPriceHand.name = 'maxPriceOld';
            document.querySelector('#manualInputContainer').hidden = true;
        let minPrice = document.querySelector('#minPriceOld');
            let maxPrice = document.querySelector('#maxPriceOld');
        document.querySelectorAll('.slidecontainer').forEach(function(item,index){
            
            minPrice.id = 'minPrice';
            minPrice.name = 'minPrice';
            maxPrice.id = 'maxPrice';
            maxPrice.name = 'maxPrice';
            item.hidden = false;
        })

    document.querySelector('#manualInput').innerHTML = 'Handmatig invoeren';
    }

});
document.querySelector('#gevraagd').addEventListener('click', function(event) {
    
    document.querySelector('.btn').click();
});
document.querySelector('#aangeboden').addEventListener('click', function(event) {
    
    document.querySelector('.btn').click();
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
