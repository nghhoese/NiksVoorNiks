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
        @if(Auth::check() && auth()->user()->isAdmin())
            <div class="filters">
                <a class="addad" href="/activiteitPlaatsen">
                    Klik hier om een activiteit te plaatsen
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        @endif
        <div class="article-list">
            @foreach($activities as $activity)
                <div class="article" id="ad1">
                    <div class="addetails">
                        <h3 class="adtitle">{{ $activity->naam }}</h3>
                        <p class="addescr">{{ $activity->beschrijving }}</p>
                        <div class="participants">
                            <p>Beschikbare
                                plekken: {{$activity->max_deelnemers - count($activity->deelnemer()->get())}}</p>
                            <p>Deelnemers: {{count($activity->deelnemer()->get())}} / {{$activity->max_deelnemers}}</p>
                        </div>
                        <label class="activity-date">{{$activity->datum}}</label>
                        @if(Auth::check())
                            <a href="/activiteitDetails/{{ $activity->id }}" class="adprice" for="ad1">Bekijken</a>
                        @endif
                        <br>
                        <br>
                    </div>
                </div>
            @endforeach
            {{$activities->links("pagination::bootstrap-4")}}
        </div>
    </div>
@endsection
