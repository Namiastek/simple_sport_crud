@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Trenerzy / Edit #{{$coatch->ID_TRENER}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('coatches.update', $coatch->ID_TRENER) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('IMIE')) has-error @endif">
                       <label for="IMIE-field">IMIE</label>
                    <input type="text" id="IMIE-field" name="IMIE" class="form-control" value="{{ $coatch->IMIE }}"/>
                       @if($errors->has("IMIE"))
                        <span class="help-block">{{ $errors->first("IMIE") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('NAZWISKO')) has-error @endif">
                       <label for="NAZWISKO-field">NAZWISKO</label>
                    <input type="text" id="NAZWISKO-field" name="NAZWISKO" class="form-control" value="{{ $coatch->NAZWISKO }}"/>
                       @if($errors->has("NAZWISKO"))
                        <span class="help-block">{{ $errors->first("NAZWISKO") }}</span>
                       @endif
                    </div>
                <div class="form-group @if($errors->has('LICENCJA_TRENERSKA_ID_LIC_TR')) has-error @endif">
                    <label for="licencja_trenera_NAZWA-field">LICENCJA_TRENERA_NAZWA</label>s
                    <select name="LICENCJA_TRENERSKA_ID_LIC_TR" class="form-control" id="licencja_trenera_NAZWA-field">
                        @foreach ($licences as $lic)
                            <option value="{{$lic->ID_LIC_TR}}" {{($lic->ID_LIC_TR==$coatch->LICENCJA_TRENERSKA_ID_LIC_TR) ? "selected" : ''}}>{{$lic->NAZWA}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Zapisz</button>
                    <a class="btn btn-link pull-right" href="{{ route('coatches.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection