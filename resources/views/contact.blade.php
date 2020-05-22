@extends ('layout')
@section('title')
    Contact
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="CSS/contact.css">
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
                            <img src="Resources/MXsfEWs.png" alt="" style="width:100%">
                            <h1></h1>
                            <p class="title"></p>
                            <p class="telefoonnummer"></p>
                        </div>
                        <div class="info-block">
                            Haha ik ben kut
                        </div>
                    </div>
                <div class="outer-card">
                    <div class="card">
                        <img src="Resources/MXsfEWs.png" alt="" style="width:100%">
                        <h1></h1>
                        <p class="title"></p>
                        <p class="telefoonnummer"></p>
                    </div>
                    <div class="info-block">
                        Haha ik ben kut
                    </div>
                </div>
                <div class="outer-card">
                    <div class="card">
                        <img src="Resources/MXsfEWs.png" alt="" style="width:100%">
                        <h1></h1>
                        <p class="title"></p>
                        <p class="telefoonnummer"></p>
                    </div>
                    <div class="info-block">
                        Haha ik ben kut
                    </div>
                </div>

            </div>
        </div>
    </div>




@endsection
