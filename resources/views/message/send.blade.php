@extends ('layout')
@section('title')
Inbox
@endsection
@section ('stylesheets')
<link rel="stylesheet" href="CSS/pagination.css">

@endsection
@section ('content')
<style>
.wrapper{
    display: flex;
justify-content: space-evenly;
flex-direction: row;
flex: 1;
margin: 50px;   
font-size: 1.2em; 
}
.inbox a{
text-decoration: none;
}
.inbox {
    overflow-x:auto;
    background-color: white;
    width:100%;
    max-width: 1405px;
    border: 2px solid #66BB6A;
}

.message-link{
    color: grey;
}
tr:hover {
    background-color: #C4E9C7;
}

table#table1 th, td {
 
  text-align: left;
  border-bottom: 2px solid #66BB6A;
  
}
table {
width:100%;
border-collapse: collapse;
}
table#table1 th{
    background-color:#66BB6A;
    color: white;   
}
.profile-picture{
    
    
    height: 40px;
    width: 40px;
}
.inbox-menu{
  border: 2px solid #66BB6A;
  background-color: white;
  height: 100%;
}
.inbox-menu a{
  text-decoration: none;
  color: black;
  margin-bottom: 10px;
}
.inbox-menu p:hover{
  background-color: grey;
  color: white;
}
.inbox-menu h4{
  background-color: #66BB6A;
  color: white;
}

.inbox-title{
  color: grey;
  margin-top:10px;
  text-align: center;
}
</style>
<h1 class="inbox-title">Verzonden Berichten</h1>
<div class="wrapper">
<div class="inbox-menu">

<h4>Menu</h4>
<a href="/inbox"><p>Inbox({{count(Auth::user()->bericht1()->where('gelezen','=',0)->get())}})</p></a>
<a href="/inbox/verzonden"><p>Verzonden Berichten</p></a>
<a href="/inbox/nieuw"><p>Nieuw Bericht Maken <i class="fas fa-paper-plane" style="color: #66BB6A;"></i> </p></a>
</div>
<div class="inbox" >


<table id="table1">
  <thead>
<tr>
<th></th>
<th>Verzonden naar</th>
<th>Onderwerp</th>

<th>Datum</th>
</tr>
  </thead>
  <tbody>

  @foreach($messages as $message)
  
<tr>  

  <td><a class="message-link"href="/inbox/view/{{$message->id}}"><img class="profile-picture" src="{{$message->deelnemer()->find($message->ontvanger_email)->foto ?? 'https://www.isarklinikum.de/en/wp-content/uploads/sites/3/2015/07/empty_avatar.jpg'}}"></a></td>
  
  <td><a class="message-link"href="/inbox/view/{{$message->id}}"><p> {{$message->ontvanger_email}}</p></a></td>

<td><a class="message-link"href="/inbox/view/{{$message->id}}"><p> {{$message->onderwerp}}</p></a></td> 

<td><a class="message-link"href="/inbox/view/{{$message->id}}"><p>{{$message->datum}} </p></a></td>


  </tr>
  </strong>  

  @endforeach
  </tbody>
  </table>
  @if(count($messages) < 1)
  <h3 style="text-align:center;">Je hebt Nog geen berichten verzonden! </h3>
  @endif  
  <div class="pagination1">
  {{$messages->links("pagination::bootstrap-4")}}
  </div>
  </div>
</div>


        
      
     

   
@endsection