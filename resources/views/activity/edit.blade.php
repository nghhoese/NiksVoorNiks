@extends ('layout')
@section('title')
    Advertentie plaatsen
@endsection
@section ('stylesheets')
    <link rel="stylesheet" href="/CSS/createActivity.css">
@endsection
@section ('content')
    <div class="plaatsactiviteit">
        <div class="createForm">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form id="form" method="post" action="/activiteit/aanpassen/{{$activity->id}}" enctype="multipart/form-data">
                @csrf
                <div class="plaatsActiviteit1">
                    <h2>Activiteit bewerken</h2><br>
                    <label for="title">Titel activiteit</label><br>
                    <input type="text" id="title" name="title" value="{{$activity->naam}}"><br><br>
                    <label for="description">Beschrijving</label><br>
                    <textarea name="description" id="description" rows="15" cols="50" value="{{$activity->beschrijving}}">{{$activity->beschrijving}}</textarea>
                    <label for="max_participants">Max aantal deelnemers:</label><br>
                    <input name="max_participants" id="max_participants" type="number" min="0" max="100" value="{{$activity->max_deelnemers}}">
                    <br><br>
                </div>
                <div class="plaatsActiviteit2">
                    <label for="date">Kies een datum</label><br>
                    <input type="date" id="date" placeholder="Activiteit datum"
                           class="form-control" name="date"
                           value="{{$activity->datum}}" required>
                    @error('dateofbirth')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <br><br><br>
                    <input class="btn" type="submit" value="Plaats activiteit">
                    <a class="trashcan" onclick="return confirm('Weet u het zeker?')" href="/activiteit/verwijderen/{{$activity->id}}"><i style="color:#66BB6A; font-size: 3em" class="fas fa-trash-alt"></i></a>
                </div>
            </form>
        </div>
    </div>
@endsection
