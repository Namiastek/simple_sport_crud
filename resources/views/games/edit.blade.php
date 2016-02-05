@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Games / Edit #{{$game->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('games.update', $game->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('SEDZIA_ID')) has-error @endif">
                       <label for="SEDZIA_ID-field">SEDZIA_ID</label>
                    <input type="text" id="SEDZIA_ID-field" name="SEDZIA_ID" class="form-control" value="{{ $game->SEDZIA_ID }}"/>
                       @if($errors->has("SEDZIA_ID"))
                        <span class="help-block">{{ $errors->first("SEDZIA_ID") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('DRUZYNA_NAZWA1')) has-error @endif">
                       <label for="DRUZYNA_NAZWA1-field">DRUZYNA_NAZWA1</label>
                    <input type="text" id="DRUZYNA_NAZWA1-field" name="DRUZYNA_NAZWA1" class="form-control" value="{{ $game->DRUZYNA_NAZWA1 }}"/>
                       @if($errors->has("DRUZYNA_NAZWA1"))
                        <span class="help-block">{{ $errors->first("DRUZYNA_NAZWA1") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('DRUZYNA_NAZWA2')) has-error @endif">
                       <label for="DRUZYNA_NAZWA2-field">DRUZYNA_NAZWA2</label>
                    <input type="text" id="DRUZYNA_NAZWA2-field" name="DRUZYNA_NAZWA2" class="form-control" value="{{ $game->DRUZYNA_NAZWA2 }}"/>
                       @if($errors->has("DRUZYNA_NAZWA2"))
                        <span class="help-block">{{ $errors->first("DRUZYNA_NAZWA2") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('stadion_NAZWA')) has-error @endif">
                       <label for="stadion_NAZWA-field">STADION_NAZWA</label>
                    <input type="text" id="stadion_NAZWA-field" name="stadion_NAZWA" class="form-control" value="{{ $game->stadion_NAZWA }}"/>
                       @if($errors->has("stadion_NAZWA"))
                        <span class="help-block">{{ $errors->first("stadion_NAZWA") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('ROZGRYWKA_NAZWA')) has-error @endif">
                       <label for="ROZGRYWKA_NAZWA-field">ROZGRYWKI_NAZWA</label>
                    <input type="text" id="ROZGRYWKA_NAZWA-field" name="ROZGRYWKA_NAZWA" class="form-control" value="{{ $game->ROZGRYWKA_NAZWA }}"/>
                       @if($errors->has("ROZGRYWKA_NAZWA"))
                        <span class="help-block">{{ $errors->first("ROZGRYWKA_NAZWA") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('data')) has-error @endif">
                       <label for="data-field">DATA</label>
                    <input type="text" id="data-field" name="data" class="form-control" value="{{ $game->data }}"/>
                       @if($errors->has("data"))
                        <span class="help-block">{{ $errors->first("data") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('games.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection