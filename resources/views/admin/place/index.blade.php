@extends ('layout')
@section('stylesheets')
    <link rel="stylesheet" href="/CSS/place.css">
@endsection
@section('title')
    Plaatsen beheren
@endsection
@section ('content')
    <div class="place">
        <b>Plaats naam:</b>
        <br>
        @foreach($places as $place)
            {{$place->naam}}
            <a onclick="return confirm('Weet u het zeker?')" href="/plaats/verwijderen/{{$place->naam}}"><i
                    class="fas fa-trash-alt" style="color:#66BB6A;"></i></a>
            <br>
        @endforeach
        <br>
        <p style="color:red;">{{$error ?? ''}}</p>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <strong style="color:red;">{{ $error }}</strong>
                @endforeach
            </div><br/>
        @endif
        <form id="form" method="post" action="/plaats/nieuw">
            @csrf
            <label for="place">Naam:</label>
            <input type="text" name="plaats" id="place" class="placename"> <br>
            <input class="btn" value="Toevoegen" type="submit">
        </form>
    </div>
@endsection
