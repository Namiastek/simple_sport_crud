@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Arenas
            <a class="btn btn-success pull-right" href="{{ route('arenas.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($arenas->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAZWA</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($arenas as $arena)
                            <tr>
                                <td>{{$arena->ID_STADION}}</td>
                                <td>{{$arena->NAZWA}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-warning" href="{{ route('arenas.edit', $arena->ID_STADION) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('arenas.destroy', $arena->ID_STADION) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center alert alert-info">BRAK!</h3>
            @endif

        </div>
    </div>

@endsection