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

</style>
<div class="wrapper">
<div class="inbox" >

<table id="table1">
  <thead>
<tr>
<th></th>
<th>Van</th>
<th>Onderwerp</th>

<th>Datum</th>
<th>Verwijderen/Wijzigen</th>
</tr>
  </thead>
  <tbody>
  @foreach($messages as $message)
  
<tr>  
  <td><a class="message-link"href="/inbox/view/{{$message->id}}"><img class="profile-picture" src="{{$message->deelnemer()->find($message->zender_email)->foto ?? 'https://www.isarklinikum.de/en/wp-content/uploads/sites/3/2015/07/empty_avatar.jpg'}}"></a></td>
  <td><strong><a class="message-link"href="/inbox/view/{{$message->id}}"><p> {{$message->zender_email}}</p></a></td>

  <td><strong><a class="message-link"href="/inbox/view/{{$message->id}}"><p> {{$message->onderwerp}}</p></a></td> 

  <td><strong><a class="message-link"href="/inbox/view/{{$message->id}}"><p>{{$message->datum}} </p></a></td>
  <td style="text-align:center;"><i class="fas fa-edit" style="color:#66BB6A;"></i> <i class="fas fa-trash-alt" style="color:#66BB6A;"></i></td>
  </tr>
  </strong>  

  @endforeach
  </tbody>
  </table>
  <a href="/inbox/nieuw" class="btn">Verzend een Nieuw Bericht</a>
  <div class="pagination1">
  {{$messages->links("pagination::bootstrap-4")}}
  </div>
  </div>
</div>


        
      
     

   
@endsection