@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> PlayerPositions / Edit #{{$player_position->ID_POZYCJA}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('player_positions.update', $player_position->ID_POZYCJA) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('NAZWA')) has-error @endif">
                       <label for="NAZWA-field">NAZWA</label>
                    <input type="text" id="NAZWA-field" name="NAZWA" class="form-control" value="{{ $player_position->NAZWA }}"/>
                       @if($errors->has("NAZWA"))
                        <span class="help-block">{{ $errors->first("NAZWA") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('player_positions.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection