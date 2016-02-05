@extends('layout')
@section('header')
<div class="page-header">
        <h1>JudgeLicences / Show #{{$judge_licence->ID_LIC_S}}</h1>
        <form action="{{ route('judge_licences.destroy', $judge_licence->ID_LIC_S) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('judge_licences.edit', $judge_licence->ID_LIC_S) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="NAZWA">NAZWA</label>
                     <p class="form-control-static">{{$judge_licence->NAZWA}}</p>
                </div>
                    <div class="form-group">
                     <label for="WYNAGRODZENIE_ZA_MECZ">WYNAGRODZENIE_ZA_MECZ</label>
                     <p class="form-control-static">{{$judge_licence->WYNAGRODZENIE_ZA_MECZ}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('judge_licences.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection