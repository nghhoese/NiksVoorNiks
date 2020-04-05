@extends ('layout')
@section('title')
    home
@endsection

@section ('content')

    <div class="plaatsadvertentie">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <div class="createForm">
            <h2>Nieuwe advertentie plaatsen</h2><br><br>
            <form method="post" action="/advertentiePlaatsen" enctype="multipart/form-data">
                @csrf
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
                <textarea name="beschrijving" id="beschrijving" rows="15" cols="50">
                    </textarea><br><br>

                <label for="price">Prijs(Niks)</label><br>
                <input type="number" id="price" name="price" min="0" max="200">
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
