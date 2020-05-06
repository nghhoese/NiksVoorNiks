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
        <p class="copyright">Designed by <a href="https://www.youtube.com/watch?v=lXMskKTw3Bc" target="_blank" title="Colorlib">Rick</a></p>
        <fieldset>
            <input value="{{$information->titel}}" tabindex="1" type="text"required name="title">
        </fieldset>
        <fieldset>
            <textarea tabindex="2" required name="info">{{$information->informatie}}</textarea>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Opslaan</button>
        </fieldset>
        <p class="copyright">Designed by <a href="https://www.youtube.com/watch?v=lXMskKTw3Bc" target="_blank" title="Colorlib">Rick</a></p>
    </form>
</div>




@endsection
