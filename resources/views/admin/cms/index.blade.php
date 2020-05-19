@extends ('layout')
@section('stylesheets')
    <link rel="stylesheet" href="CSS/aboutUs.css">
@endsection
@section('title')
    CMS
@endsection
@section ('content')

    @foreach($information as $info)

        <div class="aboutUs">
            <b>{{$info->titel}}</b>
            <br>
            <br>
            <p style="white-space: pre-line">{{$info->informatie}}</p>
            <br>
            <a class="btn" href="/cms/edit/{{$info->naam}}">Aanpassen</a>
        </div>

    @endforeach




@endsection
