@extends ('layout')
@section('title')
home
@endsection
@section('stylesheets')
<link rel="stylesheet" href="CSS/advertentiedetails.css">
@endsection
@section ('content')


<div class="content">
        <div class="flex-container">
            <div class="main-content">
                <h1 class="title">{{$advertentie->titel}}</h1>
                <img src="Resources/csm_Bakken.nl_Q2_Batch1_Pannenkoeken_Origineel_3b4e9665a9.png" >
                <div class="stats">
                    <div>Koetshuis 16, Den Bosch</div>
                </div>
                <div class="description">
                    <b>Beschrijving <br/></b>
                    <p>{{$advertentie->bechrijving}}</p>
                </div>
            </div>

            <div class="info">
                <img src="Resources/Terry.png">
                <div class="naam"><b>Terry Gestold</b></div>
                <div class="locatie">Koetshuis 16, Den Bosch</div>
                <div class="Persoonsbeschrijving">
                    Ik ben een professioneel gitaarspeler met een hobby voor bakken en koken. In mijn vrije tijd lees ik ook graag boeken en kijk ik TV-series.
                </div>
                <button class="btn">Koop nu voor 5 Niks!</button>
            </div>
        </div>
    </div>

        

        
      
     

   
@endsection