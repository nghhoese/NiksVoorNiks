@extends ('layout')
@section('title')
    Contact
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="/CSS/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section ('content')
    <div class="all-information">
        <div class="left-information">
            <h1>{{$information->titel}}</h1>
            <p style="white-space: pre-line">{{$information->informatie}}</p>
        </div>
        <div class="right-information">
            <div class="title-cards">
                    <div class="outer-card">
                        <div class="card">
                            <img src="Resources/Contact/IMG_4359.JPG" alt="" style="width:100%">
                            <h2>Lisette van Schijndel</h2>
                            <p class="title">Lid secretariaat</p>
                            <p class="telefoonnummer">06-22899114</p>
                        </div>
                        <div class="info-block">
                            <h3>Hallo mijn naam is Lisette, ik ben onderdeel <br> van het secretariaat binnen de ruilkring Niks voor Niks.</h3>
                        </div>
                    </div>
{{--                <div class="outer-card">--}}
{{--                    <div class="card">--}}
{{--                        <img src="Resources/MXsfEWs.png" alt="" style="width:100%">--}}
{{--                        <h1></h1>--}}
{{--                        <p class="title"></p>--}}
{{--                        <p class="telefoonnummer"></p>--}}
{{--                    </div>--}}
{{--                    <div class="info-block">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="outer-card">--}}
{{--                    <div class="card">--}}
{{--                        <img src="Resources/MXsfEWs.png" alt="" style="width:100%">--}}
{{--                        <h1></h1>--}}
{{--                        <p class="title"></p>--}}
{{--                        <p class="telefoonnummer"></p>--}}
{{--                    </div>--}}
{{--                    <div class="info-block">--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
