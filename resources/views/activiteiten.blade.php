@extends ('layout')
@section('title')
    Activiteiten
@endsection
@section ('content')
    <div class="articles">
        <div class="filters">

            <a class="addad" href="advertentiePlaatsen">
                Klik hier om zelf een activiteit te plaatsen
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>

        <div class="article-list">
            @foreach($activities as $activity)
                <a class="article" href="/advertentieDetails/{{ $activity->id }}" id="ad1">
                    <img src="{{$activity->foto ?? 'https://i.imgur.com/LM7EA7m.jpg'}}">
                    <div class="addetails">
                        <h3 class="adtitle">{{ $activity->titel }}</h3>
                        <p class="addescr">{{ $activity->beschrijving }}</p>
{{--                        <i class="fa fa-map-marker adloc"><label> Rosmalen</label></i>--}}
                        <label class="adprice" for="ad1">{{ $activity->prijs}} Niks</label>
                    </div>
                </a>
            @endforeach
{{--            {{$activity->links("pagination::bootstrap-4")}}--}}
        </div>
    </div>
@endsection
