@extends ('layout')
@section('stylesheets')
    <link rel="stylesheet" href="/CSS/category.css">
@endsection
@section('title')
    Categorieën
    beheren
@endsection
@section ('content')
    <div class="place">
        <b>Categorie naam:</b>
        <br>
        @foreach($categories as $category)
            {{$category->naam}}
            <a onclick="return confirm('Weet u het zeker?')" href="/categorie/verwijderen/{{$category->naam}}"><i
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
        <form id="form" method="post" action="/categorie/nieuw">
            @csrf
            <label for="categorie">Naam:</label>
            <input type="text" name="categorie" id="categorie" class="placename"> <br>
            <input class="btn" value="Toevoegen" type="submit">
        </form>
    </div>
@endsection
