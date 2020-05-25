@extends ('layout')
@section('stylesheets')
    <link rel="stylesheet" href="CSS/activity.css">
    <link rel="stylesheet" href="CSS/pagination.css">
@endsection
@section('title')
    Nieuws
@endsection
@section ('content')
        <div class="articles">
            @if(Auth::check() && auth()->user()->isAdmin())
                <div class="filters">
                    <a class="addad" href="/nieuws/nieuw">
                        Klik hier om een nieuwsbericht te plaatsen
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            @endif
                <div class="article-list">
                    @foreach($nieuws as $nieuwsbericht)
                        <div class="article" id="ad1">
                            <img src="{{$nieuwsbericht->foto ?? 'https://i.imgur.com/LM7EA7m.jpg'}}">
                            <div class="addetails">
                                <h3 class="adtitle">{{ $nieuwsbericht->naam }}</h3>
                                <p class="addescr">{{ $nieuwsbericht->beschrijving }}</p>
                                <a href="/nieuws/details/{{ $nieuwsbericht->id }}" class="adprice" for="ad1">Bekijken</a>
                                <br>
                                <br>
                            </div>
                        </div>
                    @endforeach
                    {{$nieuws->links("pagination::bootstrap-4")}}
                </div>
        </div>
@endsection
