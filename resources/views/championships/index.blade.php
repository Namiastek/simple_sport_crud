@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Rozgrywki
            <a class="btn btn-success pull-right" href="{{ route('championships.create') }}"><i class="glyphicon glyphicon-plus"></i> Nowa</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($championships->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAZWA</th>
                        <th>ZA ZWYCIESTWO</th>
                        <th>ZA REMIS</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($championships as $championship)
                            <tr>
                                <td>{{$championship->ID_ROZGRYWKI}}</td>
                                <td>{{$championship->NAZWA}}</td>
                    <td>{{$championship->ZA_ZWYCIESTWO}}</td>
                    <td>{{$championship->ZA_REMIS}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-warning" href="{{ route('championships.edit', $championship->ID_ROZGRYWKI) }}"><i class="glyphicon glyphicon-edit"></i> Edycja</a>
                                    <form action="{{ route('championships.destroy', $championship->ID_ROZGRYWKI) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Usuń</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $championships->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection