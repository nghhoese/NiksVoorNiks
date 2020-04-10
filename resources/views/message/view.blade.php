@extends ('layout')
@section('title')
view
@endsection
@section ('stylesheets')

@section ('content')
<style>
.card{
  
    margin-top:50px;
    display: flex;
    justify-content: space-evenly;
    flex-direction: row;
    flex: 1;
    margin-bottom: 50px;
    width: 100%;

  
}
.title{
    background-color:#66BB6A;
    display: flex;
justify-content: space-between;
color: white;
}
.card-header{
    border: 1px solid #66BB6A;
    color: grey;
    width: 100%;
    height: 100%;   
    max-width: 500px;
    background-color:white;

 
}





 

</style>

<div class="card" >
  <div class="card-header">
  <div class="title">
    <p>{{$message->onderwerp}}</p>

 </div>
 <h3>Verzonden door: {{$message->zender_email}}</h3>
 <h3>Verzonden op: {{$message->datum}}</h3>
<p>{{$message->inhoud}}</p>
  </div>

</div>

        
      
     

   
@endsection