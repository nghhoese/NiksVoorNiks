@extends ('layout')
@section('title')
home
@endsection
@section ('stylesheets')
<link rel="stylesheet" href="CSS/slider.css">

@endsection
@section ('content')

        <div class="content">
            <div class="slider">
                @foreach(File::glob(public_path('Resources\HomePage').'\*') as $path)
                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="{{ str_replace(public_path(), '', $path) }}">
                        <div class="text">'S Hertogenbosch en omgeving</div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="homecontent">
            <div class="over-ons-small">
                <h2>{{$information->titel}}</h2>
                <br>
                <p style="white-space: pre-line">{{$information->informatie}}</p>
                <a href="/overons" class="link">Lees meer</a>
            </div>

            <div class="preview-aanbod">

                <a href="#" class="aanbod">
                    <p class="type">Aangeboden</p>
                    <h3 class="title">{{$advertisements->where('vraag', 0)->first()->titel}}</h3>
                    <div class="aanbod-image"><img src="{{$advertisements->where('vraag', 0)->first()->foto ?? 'https://i.imgur.com/LM7EA7m.jpg'}}"></div>
                    <p class="beschrijving">{{$advertisements->where('vraag', 0)->first()->beschrijving}}</p>
                    <p class="price">{{$advertisements->where('vraag', 0)->first()->prijs}} Niksen</p>
                </a>

                <a href="#" class="aanbod">
                    <p class="type">Gevraagd</p>
                    <h3 class="title">{{$advertisements->where('vraag', 1)->first()->titel}}</h3>
                    <div class="aanbod-image"><img src="{{$advertisements->where('vraag', 1)->first()->foto ?? 'https://i.imgur.com/LM7EA7m.jpg'}}"></div>
                    <p class="beschrijving">{{$advertisements->where('vraag', 1)->first()->beschrijving}}</p>
                    <p class="price">{{$advertisements->where('vraag', 1)->first()->prijs}} Niksen</p>
                </a>

                <a href="#" class="aanbod">
                    <p class="type">Aangeboden</p>
                    <h3 class="title">{{$advertisements->where('vraag', 0)->skip(1)->first()->titel}}</h3>
                    <div class="aanbod-image"><img src="{{$advertisements->where('vraag', 0)->skip(1)->first()->foto ?? 'https://i.imgur.com/LM7EA7m.jpg'}}"></div>
                    <p class="beschrijving">{{$advertisements->where('vraag', 0)->skip(1)->first()->beschrijving}}</p>
                    <p class="price">{{$advertisements->where('vraag', 0)->skip(1)->first()->prijs}} Niksen</p>
                </a>

            </div>
        </div>

@endsection
@section('footer')
<script src="JS/slider.js"></script>
@endsection
