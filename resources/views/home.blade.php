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
                    <h3 class="title">Titel advertentie</h3>
                    <img src="Resources/MXsfEWs.png">
                    <p class="beschrijving">Beschrijving van de advertentie in het kort..</p>
                    <p class="price">10 Niks</p>
                </a>

                <a href="#" class="aanbod">
                    <p class="type">Aangeboden</p>
                    <h3 class="title">Titel advertentie</h3>
                    <img src="Resources/MXsfEWs.png">
                    <p class="beschrijving">Beschrijving van de advertentie in het kort..</p>
                    <p class="price">10 Niks</p>
                </a>

                <a href="#" class="aanbod">
                    <p class="type">Aangeboden</p>
                    <h3 class="title">Titel advertentie</h3>
                    <img src="Resources/MXsfEWs.png">
                    <p class="beschrijving">Beschrijving van de advertentie in het kort..</p>
                    <p class="price">10 Niks</p>
                </a>

            </div>
        </div>

@endsection
@section('footer')
<script src="JS/slider.js"></script>
@endsection
