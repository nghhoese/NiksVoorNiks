@extends('layout')
@section('stylesheets')
<link rel="stylesheet" href="/CSS/login.css">
@endsection
@section('content')
<div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="Email adres"/>
      <button>Nieuw wachtwoord aanvragen</button>
      <p class="message">Al een account? <a href="#">Log in</a></p>
    </form>
      <form class="login-form" method="POST" action="{{ route('login') }}">
          @csrf
        <input id="email" placeholder="E-Mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
        <input id="password" type="password" placeholder="Wachtwoord" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
      <button>login</button>
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
