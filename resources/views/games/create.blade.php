@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Mecz / Nowy  </h1>
        <h2><small>Po dodaniu wywoła funckje  zwiększenia budzetu firmy</small></h2>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('games.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('SEDZIA_ID_SEDZIA')) has-error @endif">
                    <label for="SEDZIA_ID_SEDZIA-field">Sedzia</label>
                    <select name="SEDZIA_ID_SEDZIA" class="form-control" id="SEDZIA_ID_SEDZIA-field">
                        @foreach ($judges as $lic)
                            <option value="{{$lic->ID_SEDZIA}}">{{$lic->IMIE}} {{$lic->NAZWISKO}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group @if($errors->has('DRUZYNA_ID_DRUZYNA')) has-error @endif">
                    <label for="DRUZYNA_ID_DRUZYNA-field">DRUZYNA</label>
                    <select name="DRUZYNA_ID_DRUZYNA" class="form-control" id="DRUZYNA_ID_DRUZYNA-field">
                        @foreach ($teams as $team)
                            <option value="{{$team->ID_DRUZYNA}}">{{$team->NAZWA}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group @if($errors->has('DRUZYNA_ID_DRUZYNA2')) has-error @endif">
                    <label for="DRUZYNA_ID_DRUZYNA2-field">DRUZYNA2</label>
                    <select name="DRUZYNA_ID_DRUZYNA2" class="form-control" id="DRUZYNA_ID_DRUZYNA2-field">
                        @foreach ($teams as $team)
                            <option value="{{$team->ID_DRUZYNA}}">{{$team->NAZWA}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group @if($errors->has('ROZGRYWKI_ID_ROZGRYWKI')) has-error @endif">
                    <label for="ROZGRYWKI_ID_ROZGRYWKI-field">ROZGRYWKI</label>
                    <select name="ROZGRYWKI_ID_ROZGRYWKI" class="form-control" id="ROZGRYWKI_ID_ROZGRYWKI-field">
                        @foreach ($champions as $champion)
                            <option value="{{$champion->ID_ROZGRYWKI}}">{{$champion->NAZWA}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group @if($errors->has('STADIONY_ID_STADION')) has-error @endif">
                    <label for="STADIONY_ID_STADION-field">Stadion</label>
                    <select name="STADIONY_ID_STADION" class="form-control" id="STADIONY_ID_STADION-field">
                        @foreach ($arenas as $arena)
                            <option value="{{$arena->ID_STADION}}">{{$arena->NAZWA}}</option>
                        @endforeach
                    </select>
                </div>

                    <div class="form-group @if($errors->has('DATA')) has-error @endif">
                       <label for="data-field">DATA</label>
                    <input type="datetime-local" step="3600" id="data-field" name="DATA" class="form-control" value="{{ old("DATA") }}"/>
                       @if($errors->has("DATA"))
                        <span class="help-block">{{ $errors->first("DATA") }}</span>
                       @endif
                    </div>
                <div class="form-group @if($errors->has('GOL_DRUZYNA')) has-error @endif">
                    <label for="GOL_DRUZYNA-field">GOLE DRUZYNA1</label>
                    <input type="number" id="GOL_DRUZYNA-field" name="GOL_DRUZYNA" class="form-control" value="{{ old("GOL_DRUZYNA") }}"/>
                    @if($errors->has("GOL_DRUZYNA"))
                        <span class="help-block">{{ $errors->first("GOL_DRUZYNA") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('GOL_DRUZYNA1')) has-error @endif">
                    <label for="GOL_DRUZYNA1-field">GOLE DRUZYNA1</label>
                    <input type="number" id="GOL_DRUZYNA1-field" name="GOL_DRUZYNA1" class="form-control" value="{{ old("GOL_DRUZYNA1") }}"/>
                    @if($errors->has("GOL_DRUZYNA1"))
                        <span class="help-block">{{ $errors->first("GOL_DRUZYNA1") }}</span>
                    @endif
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('games.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection