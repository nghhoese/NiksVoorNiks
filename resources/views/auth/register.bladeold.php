@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('voornaam') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Voornaam</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="voornaam" value="{{ old('voornaam') }}">

                                    @if ($errors->has('voornaam'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('voornaam') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tussenvoegsel') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Tussenvoegsel</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="tussenvoegsel" value="{{ old('tussenvoegsel') }}">

                                    @if ($errors->has('tussenvoegsel'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('tussenvoegsel') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('achternaam') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Achternaam</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="achternaam" value="{{ old('achternaam') }}">

                                    @if ($errors->has('achternaam'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('achternaam') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('geboortedatum') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Geboortedatum</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="geboortedatum" value="{{ old('geboortedatum') }}">

                                    @if ($errors->has('geboortedatum'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('geboortedatum') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('telefoonnummer') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Telefoonnummer</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="telefoonnummer" value="{{ old('telefoonnummer') }}">

                                    @if ($errors->has('telefoonnummer'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('telefoonnummer') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Postcode</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="postcode" value="{{ old('postcode') }}">

                                    @if ($errors->has('postcode'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('huisnummer') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Huisnummer</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="huisnummer" value="{{ old('huisnummer') }}">

                                    @if ($errors->has('huisnummer'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('huisnummer') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('rol_naam') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Rolnaam</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="rol_naam" value="{{ old('rol_naam') }}">

                                    @if ($errors->has('rol_naam'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('rol_naam') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('wachtwoord') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Wachtwoord</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="wachtwoord">

                                    @if ($errors->has('wachtwoord'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('wachtwoord') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('wachtwoord_bevestiging') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Bevestig Wachtwoord</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="wachtwoord_bevestiging">

                                    @if ($errors->has('wachtwoord_bevestiging'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('wachtwoord_bevestiging') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
