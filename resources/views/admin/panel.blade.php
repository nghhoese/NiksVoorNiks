@extends ('layout')
@section('stylesheets')
    <link rel="stylesheet" href="/CSS/adminPanel.css">
@endsection
@section('title')
    Panel
@endsection
@section ('content')
    <div class="panel">
        <h1>Administratiepaneel</h1>
        <a href="/users/index" class="btn">Deelnemers beheren</a>
        <a href="/cms" class="btn">CMS</a>
        <a href="/activiteiten" class="btn">Activiteiten</a>
        <a href="/nieuws" class="btn">Nieuws</a>
        <a href="/plaats" class="btn">Plaats beheren</a>
        <a href="/categorie" class="btn">Categorieën beheren</a>
    </div>
@endsection
