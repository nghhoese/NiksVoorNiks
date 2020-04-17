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
    <p>Niew Bericht</p>

 </div>
 <form method="post" action="/inbox/verzenden">
@csrf
<label>Aan: </label><br>
<input name="to" type="text"><br>
<label>Onderwerp: </label><br>
<input name="subject"type="text"><br>
<label for="bericht">Bericht: </label><br>
<textarea name="message" rows="15" cols="50"></textarea><br>
<input type="submit" value="Verzend Bericht">
 </form>
  </div>

</div>






@endsection
