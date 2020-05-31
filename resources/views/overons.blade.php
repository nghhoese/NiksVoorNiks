@extends ('layout')
@section('stylesheets')
    <link rel="stylesheet" href="/CSS/aboutUs.css">
@endsection
@section('title')
    Over ons
@endsection
@section ('content')
    <div class="aboutUs">
        <b>{{$information->titel}}</b>
        <br>
        <br>
        <p style="white-space: pre-line">{{$information->informatie}}</p>
    </div>
@endsection
