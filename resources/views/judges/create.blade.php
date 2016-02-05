@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Sędzia / Nowy</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('judges.store') }}" method="POST">
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
                    <div class="form-group @if($errors->has('DATA_DEBIUTU')) has-error @endif">
                       <label for="data_debiutu-field">DATA_DEBIUTU</label>
                    <input type="date" id="data_debiutu-field" name="DATA_DEBIUTU" class="form-control" value="{{ old("DATA_DEBIUTU") }}"/>
                       @if($errors->has("DATA_DEBIUTU"))
                        <span class="help-block">{{ $errors->first("DATA_DEBIUTU") }}</span>
                       @endif
                    </div>

                <div class="form-group @if($errors->has('LICENCJA_SEDZIEGO_ID_LIC_S')) has-error @endif">
                    <label for="LICENCJA_SEDZIEGO_ID_LIC_S-field">LICENCJA_SEDZIEGO_Nazwa</label>
                    <select name="LICENCJA_SEDZIEGO_ID_LIC_S" class="form-control" id="LICENCJA_SEDZIEGO_ID_LIC_S-field">
                        @foreach ($licences as $lic)
                            <option value="{{$lic->ID_LIC_S}}">{{$lic->NAZWA}} ({{$lic->WYNAGRODZENIE_ZA_MECZ}})</option>
                        @endforeach
                    </select>

                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('judges.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection