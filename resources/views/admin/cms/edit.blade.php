@extends ('layout')
@section('stylesheets')
    <link rel="stylesheet" href="/CSS/aboutUs.css">
    <link rel="stylesheet" href="/CSS/form.css">
@endsection
@section('title')
    CMS
@endsection
@section ('content')
<div class="flexbox">
    <form id="form" action="" method="post">
        @csrf
        <h3>{{$information->naam}} aanpassen</h3>
        <fieldset>
            <input value="{{$information->titel}}" tabindex="1" type="text"required name="title">
        </fieldset>
        <fieldset>
            <textarea tabindex="2" required name="info">{{$information->informatie}}</textarea>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Opslaan</button>
        </fieldset>
    </form>
</div>
@endsection
