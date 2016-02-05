@extends('layout')
@section('header')
<div class="page-header">
        <h1>Games / Show #{{$game->id}}</h1>
        <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('games.edit', $game->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="SEDZIA_ID">SEDZIA_ID</label>
                     <p class="form-control-static">{{$game->SEDZIA_ID}}</p>
                </div>
                    <div class="form-group">
                     <label for="DRUZYNA_NAZWA1">DRUZYNA_NAZWA1</label>
                     <p class="form-control-static">{{$game->DRUZYNA_NAZWA1}}</p>
                </div>
                    <div class="form-group">
                     <label for="DRUZYNA_NAZWA2">DRUZYNA_NAZWA2</label>
                     <p class="form-control-static">{{$game->DRUZYNA_NAZWA2}}</p>
                </div>
                    <div class="form-group">
                     <label for="stadion_NAZWA">STADION_NAZWA</label>
                     <p class="form-control-static">{{$game->stadion_NAZWA}}</p>
                </div>
                    <div class="form-group">
                     <label for="ROZGRYWKA_NAZWA">ROZGRYWKI_NAZWA</label>
                     <p class="form-control-static">{{$game->ROZGRYWKA_NAZWA}}</p>
                </div>
                    <div class="form-group">
                     <label for="data">DATA</label>
                     <p class="form-control-static">{{$game->data}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('games.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection