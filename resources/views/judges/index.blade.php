@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Sedziowie
            <a class="btn btn-success pull-right" href="{{ route('judges.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($judges->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>IMIE</th>
                        <th>NAZWISKO</th>
                        <th>DATA_DEBIUTU</th>
                        <th>LICENCJA_SEDZIEGO_NAZWA</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($judges as $judge)
                            <tr>
                                <td>{{$judge->ID_SEDZIA}}</td>
                                <td>{{$judge->IMIE}}</td>
                    <td>{{$judge->NAZWISKO}}</td>
                    <td>{{date('Y-m-d', strtotime($judge->DATA_DEBIUTU))}}</td>
                                <td>{{$list[$judge->LICENCJA_SEDZIEGO_ID_LIC_S]}}</td>
                                <td class="text-right">

                                    <a class="btn btn-xs btn-warning" href="{{ route('judges.edit', $judge->ID_SEDZIA) }}"><i class="glyphicon glyphicon-edit"></i> Edycja</a>
                                    <form action="{{ route('judges.destroy', $judge->ID_SEDZIA) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $judges->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection