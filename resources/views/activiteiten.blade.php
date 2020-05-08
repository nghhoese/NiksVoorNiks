@extends ('layout')
@section('title')
    Activiteiten
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="CSS/pagination.css">
    <link rel="stylesheet" href="CSS/activity.css">
@endsection
@section ('content')
    <div class="articles">
{{--        <div class="filters">--}}

{{--            <a class="addad" href="activiteitPlaatsen">--}}
{{--                Klik hier om zelf een activiteit te plaatsen--}}
{{--                <i class="fa fa-arrow-right"></i>--}}
{{--            </a>--}}
{{--        </div>--}}

        <div class="article-list">
            @foreach($activities as $activity)
                <a class="article" href="/advertentieDetails/{{ $activity->id }}" id="ad1">
                    {{-- Activiteit heeft geen foto --}}
                    {{-- <img src="{{$activity->foto ?? 'https://lh3.googleusercontent.com/proxy/57DtuXp4Ii7bGtFLht81AMAPB-y859OKGnyRf24YnXuaJahdHgjOC_zIwFjL6TXm2LMuvswnD6iL_1WtkPtNkMaIMDj5aR2mv83Md92RLEejIqHZj-JAta9ncWZoiBrZhViqB6Xhy29CW1zVGt5KhNSFPkLgd-WMBQ4pj6uqAje-U8OGtPz_EOKKSWT3MeJ_1I468cSylWSH-_2iUchESkVknSe5V_p2FStTdYfoNR8olzKDrVg6KES42ckyHiev'}}">--}}
                    <div class="addetails">
                        <h3 class="adtitle">{{ $activity->naam }}</h3>
                        <p class="addescr">{{ $activity->beschrijving }}</p>
                        {{--                        <i class="fa fa-map-marker adloc"><label> Rosmalen</label></i>--}}
                        <label class="activity-date">{{$activity->datum}}</label>
                        <label class="adprice" for="ad1">Deelnemen? Klik hier!</label>
                    </div>
                </a>
            @endforeach
{{--            {{$activity->links("pagination::bootstrap-4")}}--}}
        </div>
    </div>
@endsection
