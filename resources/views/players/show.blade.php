@extends('layout')
@section('header')
<div class="page-header">
        <h1>Players / Show #{{$player->id}}</h1>
        <form action="{{ route('players.destroy', $player->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('players.edit', $player->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="IMIE">IMIE</label>
                     <p class="form-control-static">{{$player->IMIE}}</p>
                </div>
                    <div class="form-group">
                     <label for="NAZWISKO">NAZWISKO</label>
                     <p class="form-control-static">{{$player->NAZWISKO}}</p>
                </div>
                    <div class="form-group">
                     <label for="pozycja_id_pozycja">POZYCJA_ID_POZYCJA</label>
                     <p class="form-control-static">{{$player->pozycja_id_pozycja}}</p>
                </div>
                    <div class="form-group">
                     <label for="DRUZYNA_id_druzyna">DRUZYNA_ID_DRUZYNA</label>
                     <p class="form-control-static">{{$player->DRUZYNA_id_druzyna}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('players.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection