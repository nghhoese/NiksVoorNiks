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
        @if($user->rol_naam == "administrator")
            <div class="filters">
                <a class="addad" href="/activiteitPlaatsen">
                    Klik hier om een activiteit te plaatsen
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        @endif
        <div class="article-list">
            @foreach($activities as $activity)
                <a class="article" href="/activiteitDetails/{{ $activity->id }}" id="ad1">
                    <div class="addetails">
                        <h3 class="adtitle">{{ $activity->naam }}</h3>
                        <p class="addescr">{{ $activity->beschrijving }}</p>
                        <label class="activity-date">{{$activity->datum}}</label>
                        <label class="adprice" for="ad1">Deelnemen? Klik hier!</label>
                    </div>
                </a>
            @endforeach
            {{$activities->links("pagination::bootstrap-4")}}
        </div>
    </div>
@endsection
