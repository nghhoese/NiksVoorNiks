@extends ('layout')
@section('title')
home
@endsection
@section ('content')

<div class="plaatsadvertentie">

            <div class="createForm">
                <h2>Nieuwe advertentie plaatsen</h2><br><br>
                <form>
                    <label for="category">Kies een rubriek</label><br>
                    <select id="category" name="category">
                        <option value="huishoudelijk">Huishoudelijke hulp</option>
                        <option value="eten">Eten</option>
                        <option value="voertuigen">Voertuigen</option>
                        <option value="overig">Overige diensten</option>
                    </select><br><br>

                    <label for="group">Kies een groep(optioneel)</label><br>
                    <select id="group" name="group">
                        <option value="bloem">De bloemenclub</option>
                        <option value="wijk">Maaspoort</option>
                    </select><br><br>


                    <label for="title">Titel advertentie</label><br>
                    <input type="text" id="title" name="title"><br><br>

                    <label for="beschrijving">Beschrijving</label><br>
                    <textarea name="beschrijving" rows="15" cols="50">
                    </textarea><br><br>

                    <label for="price">Prijs(Niks)</label><br>
                    <input type="number" id="price" name="price">
                    <br><br>

                    <label for="img">Voeg eventueel foto's toe</label><br>
                    <input type="file" id="img" name="img" accept="image/*"><br><br>

                    <label for="locatie">Locatie(postcode)</label><br>
                    <input type="text" id="locatie" name="locatie"><br><br>

                    <input type="submit" value="Plaats advertentie">



                </form>
            </div>
        </div>



        

        
      
     

   
@endsection