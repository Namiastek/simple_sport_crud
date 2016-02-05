@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Druzyna / Edycja #{{$team->ID_DRUZYNA}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('teams.update', $team->ID_DRUZYNA) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('NAZWA')) has-error @endif">
                       <label for="NAZWA-field">NAZWA</label>
                    <input type="text" id="NAZWA-field" name="NAZWA" class="form-control" value="{{ $team->NAZWA }}"/>
                       @if($errors->has("NAZWA"))
                        <span class="help-block">{{ $errors->first("NAZWA") }}</span>
                       @endif
                    </div>

                <div class="form-group @if($errors->has('TRENER_ID_TRENER')) has-error @endif">
                    <label for="TRENER_ID_TRENER-field">TRENER_NAZWA</label>
                    <select name="TRENER_ID_TRENER" class="form-control" id="TRENER_ID_TRENER-field">
                        @foreach ($coaches as $coach)
                            <option value="{{$coach->ID_TRENER}}" {{($coach->ID_TRENER==$team->TRENER_ID_TRENER) ? "selected" : ''}}>{{$coach->IMIE . ' ' . $coach->NAZWISKO}}</option>
                        @endforeach
                    </select>
                </div>

                    <div class="form-group @if($errors->has('BUDZET')) has-error @endif">
                       <label for="BUDZET-field">BUDZET</label>
                    <input type="number" id="BUDZET-field" name="BUDZET" class="form-control" value="{{ $team->BUDZET }}"/>
                       @if($errors->has("BUDZET"))
                        <span class="help-block">{{ $errors->first("BUDZET") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('teams.index') }}"><i class="glyphicon glyphicon-backward"></i>  Wstecz</a>
                </div>
            </form>

        </div>
    </div>
@endsection