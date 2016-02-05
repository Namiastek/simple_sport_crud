@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Pozycja gracza
            <a class="btn btn-success pull-right" href="{{ route('player_positions.create') }}"><i class="glyphicon glyphicon-plus"></i> Nowa</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($player_positions->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAZWA</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($player_positions as $player_position)
                            <tr>
                                <td>{{$player_position->ID_POZYCJA}}</td>
                                <td>{{$player_position->NAZWA}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-warning" href="{{ route('player_positions.edit', $player_position->ID_POZYCJA) }}"><i class="glyphicon glyphicon-edit"></i> Edycja</a>
                                    <form action="{{ route('player_positions.destroy', $player_position->ID_POZYCJA) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Usuń</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $player_positions->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection