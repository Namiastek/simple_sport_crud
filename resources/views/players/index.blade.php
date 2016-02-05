@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Piłkarze
            <a class="btn btn-success pull-right" href="{{ route('players.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($players->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>IMIE</th>
                        <th>NAZWISKO</th>
                        <th>POZYCJA</th>
                        <th>DRUZYNA</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($players as $player)
                            <tr>
                                <td>{{$player->ID_PILKARZ}}</td>
                                <td>{{$player->IMIE}}</td>
                    <td>{{$player->NAZWISKO}}</td>
                    <td>{{$positions[$player->POZYCJA_ID_POZYCJA]}}</td>
                    <td>{{$teams[$player->DRUZYNA_ID_DRUZYNA]}}</td>

                                <td class="text-right">

                                    <a class="btn btn-xs btn-warning" href="{{ route('players.edit', $player->ID_PILKARZ) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('players.destroy', $player->ID_PILKARZ) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $players->render() !!}
            @else
                <h3 class="text-center alert alert-info">PUSTO!</h3>
            @endif

        </div>
    </div>

@endsection