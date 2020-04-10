@extends ('layout')
@section('title')
Inbox
@endsection
@section ('stylesheets')
<link rel="stylesheet" href="CSS/pagination.css">

@endsection
@section ('content')
<style>
.card{
  
    margin-top:50px;
    display: flex;
    justify-content: space-evenly;
    flex-direction: row;
    flex: 1;
    margin-bottom: 50px;

  
}
.title{
    background-color:#66BB6A;
    display: flex;
justify-content: space-between;
}
.card-header{
    border: 1px solid #66BB6A;
    color:white;
    width: 100%;
    max-width: 500px;
    background-color:white;

 
}
li:hover{
    background-color: #C4E9C7;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
font-size: 1em;



}
li{
    border-bottom: 1px solid #66BB6A;
    display: flex;
  align-items: center;
  justify-content: space-between;
  
}
.profile-picture{
    width: 30px;
    height: 30px;
}
.message-link{
    text-decoration: none;  
}
.date{
    text-align:right
}
.card-header a{
color: grey;

}
.title a{
color:white;
text-decoration: none;

}
.pagination1{
    flex: 1;
}
 

</style>

<div class="card" >
  <div class="card-header">
  <div class="title">
    <p>Inbox</p>
    <a href=""><p>+</p></a>  
 </div>
  <ul>
  @foreach($messages as $message)
  <strong><a class="message-link"href="/inbox/view/{{$message->id}}"> <li><img class="profile-picture" src="{{$user->foto ?? 'https://www.isarklinikum.de/en/wp-content/uploads/sites/3/2015/07/empty_avatar.jpg'}}"><p> {{$message->onderwerp}}</p> <p>{{$message->datum}} </p></li></a></strong>
  @endforeach
  </ul>
  <div class="pagination1">
  {{$messages->links("pagination::bootstrap-4")}}
  </div>
  </div>

</div>

        
      
     

   
@endsection