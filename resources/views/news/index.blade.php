@extends ('layout')
@section('stylesheets')
    <link rel="stylesheet" href="CSS/news.css">
    <link rel="stylesheet" href="CSS/pagination.css">
@endsection
@section('title')
    Nieuws
@endsection
@section ('content')



        <div class="news">
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
                            <img src="{{$advertentie->foto ?? 'https://i.imgur.com/LM7EA7m.jpg'}}">
                            <div class="addetails">
                                <h3 class="adtitle">{{ $nieuwsbericht->naam }}</h3>
                                <p class="addescr">{{ $nieuwsbericht->beschrijving }}</p>
                                @if(Auth::check())
                                    <a href="/nieuws/details/{{ $nieuwsbericht->id }}" class="adprice" for="ad1">Bekijken</a>
                                @endif
                                <br>
                                <br>
                            </div>
                        </div>

                    @endforeach
{{--                    {{$nieuwsbericht->links("pagination::bootstrap-4")}}--}}
                </div>

        </div>



@endsection
