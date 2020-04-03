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
            {{ Form::open(['route'=>'advertenties.index', 'method'=>'POST'] ) }}
                {{ Form::label('categorie', 'Categorie:') }}
                {{ Form::select('categorie', $categorieen, '', [ 'placeholder'=> 'Kies een categorie' ]) }}; <br>

                {{ Form::label('vraagaanbod', 'Vraag en aanbod:') }} <br>
                {{ Form::select('vraagaanbod', ['Geen voorkeur', 'Gevraagd', 'Aangeboden'], '', [ 'placeholder'=>'Gevraagd of aangeboden' ]) }}; <br>

                {{ Form::label('locatie', 'Locatie:')}} <br>
                {{ Form::text('locatie', 'Locatie')}} <br>

                {{ Form::label('prijs', 'Prijs:')}} <br>
                {{ Form::label('minprijs', 'Min.')}}
                {{ Form::text('minprijs', '')}}

                {{ Form::label('maxprijs', 'Max.')}}
                {{ Form::text('maxprijs', '')}} <br>

                {{ Form::select('groep', $groepen, '', [ 'placeholder'=>'Kies een groep' ]) }} <br>

                {{ Form::submit('Filteren!')}} <br>
            {{ Form::close() }}

        </form>

        <a class="addad" href="advertentiePlaatsen.php">
            Klik hier om zelf een advertentie te plaatsen
            <i class="fa fa-arrow-right"></i>
        </a>
    </div>

    <div class="article-list">
    @foreach($advertenties as $advertentie)
        <a class="article" href="#" id="ad1">
            <img src="{{ $advertentie->foto }}" alt="placeholder">
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
