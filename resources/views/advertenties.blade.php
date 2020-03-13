@extends ('layout')
@section('title')
home
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

        <a class="addad" href="advertentiePlaatsen.php">
            Klik hier om zelf een advertentie te plaatsen
            <i class="fa fa-arrow-right"></i>
        </a>
    </div>

    <div class="article-list">
        <a class="article" href="#" id="ad1">
            <img src="Resources/MXsfEWs.png" alt="placeholder">
            <div class="addetails">
                <p class="adtype">Aangeboden</p><br>
                <h3 class="adtitle">Verse appels</h3>
                <p class="addescr">Vers geplukte appels. Ik heb een aantal appelbomen, maar ze geven zo veel appels, dat ik ze niet allemaal alleen op kan. De appels worden verkocht per kilo.</p>
                <i class="fa fa-map-marker adloc"><label> Rosmalen</label></i>
                <label class="adprice" for="ad1">1 Niks</label>
            </div>
        </a>

        <a class="article" href="#" id="ad2">
            <img src="Resources/MXsfEWs.png" alt="placeholder">
            <div class="addetails">
                <p class="adtype">Aangeboden</p><br>
                <h3 class="adtitle">Auto's wassen</h3>
                <p class="addescr">Heeft u een auto die nodig gewassen moet worden? Neem dan contact op met mij.</p>
                <i class="fa fa-map-marker adloc"><label> 's-Hertogenbosch centrum</label></i>
                <label class="adprice" for="ad2">3 Niks</label>
            </div>
        </a>

        <a class="article" href="#" id="ad3">
            <img src="Resources/grasmaaier.png" alt="grasmaaier">
            <div class="addetails">
                <p class="adtype">Gevraagd</p><br>
                <h3 class="adtitle">Gras laten maaien</h3>
                <p class="addescr">Ik zoek iemand om mijn voortuin een keer te maaien. Mijn voortuin is 66 vierkante meter. Ik heb al een grasmaaier klaar staan in de schuur.</p>
                <i class="fa fa-map-marker adloc"><label> Vlijmen</label></i>
                <label class="adprice" for="ad3">2 Niks</label>
            </div>
        </a>

        <a class="article" href="#" id="ad4">
            <img src="Resources/fiets.png" alt="fiets">
            <div class="addetails">
                <p class="adtype">Aangeboden</p><br>
                <h3 class="adtitle">Tweedehands fiets</h3>
                <p class="addescr">Een tweedehands fiets in goede staat. Het is een Gazelle vrouwenfiets uit 2005. 7 versnellingen. Voor- en achterlicht werken op dynamo.</p>
                <i class="fa fa-map-marker adloc"><label> Vlijmen</label></i>
                <label class="adprice" for="ad4">5 Niks</label>
            </div>
        </a>

    </div>
</div>

        
      
     

   
@endsection