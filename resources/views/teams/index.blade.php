@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Druzyny
            <a class="btn btn-success pull-right" href="{{ route('teams.create') }}"><i class="glyphicon glyphicon-plus"></i> Nowa</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($teams->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAZWA</th>
                        <th>TRENER</th>
                        <th>BUDZET</th>
                            <th class="text-right">Akcje</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($teams as $team)
                            <tr>
                                <td>{{$team->ID_DRUZYNA}}</td>
                                <td>{{$team->NAZWA}}</td>
                    <td>{{isset($list[$team->TRENER_ID_TRENER]) ? $list[$team->TRENER_ID_TRENER] : 'Nieprzypisano'}}</td>
                    <td>{{$team->BUDZET}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-warning" href="{{ route('teams.edit', $team->ID_DRUZYNA) }}"><i class="glyphicon glyphicon-edit"></i> Edycja</a>
                                    <form action="{{ route('teams.destroy', $team->ID_DRUZYNA) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Usuń</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $teams->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection