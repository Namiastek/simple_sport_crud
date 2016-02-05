@extends('layout')
@section('header')
<div class="page-header">
        <h1>Coatches / Show #{{$coatch->id}}</h1>
        <h2>Efekt funkcji na bazie:
        @foreach($MYK as $myk)
            @foreach((array)$myk as $cos)
            {{$cos}}
                @endforeach
        @endforeach
        </h2>
        <form action="{{ route('coatches.destroy', $coatch->ID_TRENER) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('coatches.edit', $coatch->ID_TRENER) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                    <p class="form-control-static">{{$coatch->ID_TRENER}}</p>
                </div>
                <div class="form-group">
                     <label for="IMIE">IMIE</label>
                     <p class="form-control-static">{{$coatch->IMIE}}</p>
                </div>
                    <div class="form-group">
                     <label for="NAZWISKO">NAZWISKO</label>
                     <p class="form-control-static">{{$coatch->NAZWISKO}}</p>
                </div>
                    <div class="form-group">
                     <label for="licencja_trenera_NAZWA">LICENCJA_TRENERA_NAZWA</label>
                     <p class="form-control-static">{{$list[$coatch->LICENCJA_TRENERSKA_ID_LIC_TR]}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('coatches.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection