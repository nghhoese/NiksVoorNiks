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
            <form id="form" method="post" action="/activiteitPlaatsen" enctype="multipart/form-data">
                @csrf
                <div class="plaatsActiviteit1">
                    <h2>Nieuwe activiteit plaatsen</h2><br>
                    <label for="title">Titel activiteit</label><br>
                    <input type="text" id="title" name="title"><br><br>
                    <label for="description">Beschrijving</label><br>
                    <textarea name="description" id="description" rows="15" cols="50"></textarea>
                    <label for="max_participants">Max aantal deelnemers:</label><br>
                    <input name="max_participants" id="max_participants" type="number" min="0" max="100"><br><br>
                </div>
                <div class="plaatsActiviteit2">
                    <label for="date">Kies een datum</label><br>
                    <input type="date" id="date" placeholder="Activiteit datum"
                           class="form-control @error('date') is-invalid @enderror" name="date"
                           value="{{ old('date') }}" required>
                    @error('dateofbirth')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <br><br><br>
                    <input type="submit" value="Plaats activiteit">
                </div>
            </form>
        </div>
    </div>
@endsection
