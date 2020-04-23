@extends ('layout')
@section('title')
nieuw bericht
@endsection
@section ('stylesheets')
<link rel="stylesheet" href="/CSS/messageStyle.css">

@endsection
@section ('content')


<div class="card" >
  <div class="card-header">
  <div class="title">
    <p>Niew Bericht</p>

 </div>
 <form method="post" action="/inbox/verzenden">
@csrf
<label><b>Ontvanger: </b></label><br>
<input name="to" type="text"><br>
<label><b>Onderwerp: </b></label><br>
<input name="subject"type="text"><br>
<label for="bericht"><b>Bericht: </b></label><br>
<textarea name="message" rows="15" cols="50"></textarea><br>

<input class="btn" type="submit" value="Verzend Bericht">
 </form>
 <div class="back">
<a href="/inbox"><i class="fas fa-arrow-left">Terug naar inbox</i></a>
  </div>
  </div>

</div>

        
      
     

   
@endsection