@extends ('layout')
@section('title')
view
@endsection
@section ('stylesheets')
<link rel="stylesheet" href="/CSS/messageStyle.css">

@section ('content')


<div class="card" >
  <div class="card-header">
  <div class="title">
    <p>{{$message->onderwerp}}</p>

 </div>
 <h3>Verzonden door: {{$message->zender_email}}</h3>
 <h3>Verzonden op: {{$message->datum}}</h3>
 <h3>Bericht: </h3>
<p style="white-space: pre-line">{{$message->inhoud}}</p>
<a href="/inbox/reageer/{{$message->id}}"class="btn">Reageer op dit bericht</a>
<div class="back">
<a href="/inbox"><i class="fas fa-arrow-left">Terug naar inbox</i></a>
  </div>
  </div>

</div>

@endsection
