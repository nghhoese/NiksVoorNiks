@extends('layout')
@section('stylesheets')
<link rel="stylesheet" href="CSS/login.css">

@endsection
@section('content')
<div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="Email adres"/>
      <button>Nieuw wachtwoord aanvragen</button>
      <p class="message">Al een account? <a href="#">Log in</a></p>
    </form>
    <form class="login-form">
      <input type="text" placeholder="Email"/>
      <input type="password" placeholder="Wachtwoord"/>
      <button>login</button>
      <p class="message">Wachtwoord vergeten? <a href="#">Vraag een nieuw wachtwoord aan!</a></p>
    </form>
  </div>
</div>
@endsection
@section('footer')
<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
@endsection
