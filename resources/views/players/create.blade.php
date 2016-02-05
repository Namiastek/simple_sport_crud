@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Piłkarz / Nowy </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('players.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('IMIE')) has-error @endif">
                       <label for="IMIE-field">IMIE</label>
                    <input type="text" id="IMIE-field" name="IMIE" class="form-control" value="{{ old("IMIE") }}"/>
                       @if($errors->has("IMIE"))
                        <span class="help-block">{{ $errors->first("IMIE") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('NAZWISKO')) has-error @endif">
                       <label for="NAZWISKO-field">NAZWISKO</label>
                    <input type="text" id="NAZWISKO-field" name="NAZWISKO" class="form-control" value="{{ old("NAZWISKO") }}"/>
                       @if($errors->has("NAZWISKO"))
                        <span class="help-block">{{ $errors->first("NAZWISKO") }}</span>
                       @endif
                    </div>

                <div class="form-group @if($errors->has('POZYCJA_ID_POZYCJA')) has-error @endif">
                    <label for="POZYCJA_ID_POZYCJA-field">POZYCJA</label>
                    <select name="POZYCJA_ID_POZYCJA" class="form-control" id="POZYCJA_ID_POZYCJA-field">
                        @foreach ($positions as $pos)
                            <option value="{{$pos->ID_POZYCJA}}">{{$pos->NAZWA}}</option>
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



                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Zapisz</button>
                    <a class="btn btn-link pull-right" href="{{ route('players.index') }}"><i class="glyphicon glyphicon-backward"></i> Wstecz</a>
                </div>
            </form>

        </div>
    </div>
@endsection