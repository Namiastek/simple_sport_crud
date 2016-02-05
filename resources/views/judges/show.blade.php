@extends('layout')
@section('header')
<div class="page-header">
        <h1>Judges / Show #{{$judge->id}}</h1>
        <form action="{{ route('judges.destroy', $judge->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('judges.edit', $judge->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <p class="form-control-static">{{$judge->IMIE}}</p>
                </div>
                    <div class="form-group">
                     <label for="NAZWISKO">NAZWISKO</label>
                     <p class="form-control-static">{{$judge->NAZWISKO}}</p>
                </div>
                    <div class="form-group">
                     <label for="data_debiutu">DATA_DEBIUTU</label>
                     <p class="form-control-static">{{$judge->data_debiutu}}</p>
                </div>
                    <div class="form-group">
                     <label for="licencja_sedziego_NAZWA">LICENCJA_SEDZIEGO_NAZWA</label>
                     <p class="form-control-static">{{$judge->licencja_sedziego_NAZWA}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('judges.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection