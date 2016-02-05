@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Pozycja gracza / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('player_positions.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('NAZWA')) has-error @endif">
                       <label for="NAZWA-field">NAZWA</label>
                    <input type="text" id="NAZWA-field" name="NAZWA" class="form-control" value="{{ old("NAZWA") }}"/>
                       @if($errors->has("NAZWA"))
                        <span class="help-block">{{ $errors->first("NAZWA") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Zapisz</button>
                    <a class="btn btn-link pull-right" href="{{ route('player_positions.index') }}"><i class="glyphicon glyphicon-backward"></i> Wstecz</a>
                </div>
            </form>

        </div>
    </div>
@endsection