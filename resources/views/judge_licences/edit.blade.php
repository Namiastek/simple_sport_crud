@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> JudgeLicences / Edit #{{$judge_licence->ID_LIC_S}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('judge_licences.update', $judge_licence->ID_LIC_S) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('NAZWA')) has-error @endif">
                       <label for="NAZWA-field">NAZWA</label>
                    <input type="text" id="NAZWA-field" name="NAZWA" class="form-control" value="{{ $judge_licence->NAZWA }}"/>
                       @if($errors->has("NAZWA"))
                        <span class="help-block">{{ $errors->first("NAZWA") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('WYNAGRODZENIE_ZA_MECZ')) has-error @endif">
                       <label for="WYNAGRODZENIE_ZA_MECZ-field">WYNAGRODZENIE_ZA_MECZ</label>
                    <input type="text" id="WYNAGRODZENIE_ZA_MECZ-field" name="WYNAGRODZENIE_ZA_MECZ" class="form-control" value="{{ $judge_licence->WYNAGRODZENIE_ZA_MECZ }}"/>
                       @if($errors->has("WYNAGRODZENIE_ZA_MECZ"))
                        <span class="help-block">{{ $errors->first("WYNAGRODZENIE_ZA_MECZ") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('judge_licences.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection