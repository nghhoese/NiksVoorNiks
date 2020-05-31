@extends('layout')
@section('stylesheets')
    <link rel="stylesheet" href="/CSS/inProgress.css">
@endsection
@section('content')
    <div class="inProgress-page">
        <div class="form">
            <form class="inProgress-form">
                <h2 type="text">Uw registratieverzoek is in behandeling.</h2>
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
