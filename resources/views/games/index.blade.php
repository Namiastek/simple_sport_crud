@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i>  Mecze
            <a class="btn btn-success pull-right" href="{{ route('games.create') }}"><i class="glyphicon glyphicon-plus"></i> Nowy</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($games->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                        <th>DATA</th>
                            <th>SEDZIA</th>
                        <th>DRUZYNA 1</th>
                        <th>DRUZYNA 2</th>
                        <th>STADION </th>
                        <th>ROZGRYWKI </th>
                        <th>WYNIK</th>
                            <th class="text-right">AKCJE</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($games as $game)
                            <tr>
                                <td>{{$game->ID_MECZ}}</td>
                                <td>{{$game->DATA}}</td>
                                <td>{{$judges[$game->SEDZIA_ID_SEDZIA]}}</td>
                                <td>{{$teams[$game->DRUZYNA_ID_DRUZYNA]}}</td>
                                <td>{{$teams[$game->DRUZYNA_ID_DRUZYNA2]}}</td>
                                <td>{{$arenas[$game->STADIONY_ID_STADION]}}</td>
                                <td>{{$champions[$game->ROZGRYWKI_ID_ROZGRYWKI]}}</td>
                                <td><strong>{{$game->GOL_DRUZYNA}}:{{$game->GOL_DRUZYNA1}}</strong></td>
                                <td class="text-right">
                                    <form action="{{ route('games.destroy', $game->ID_MECZ) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $games->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection