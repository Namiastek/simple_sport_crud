@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Trenerzy
            <a class="btn btn-success pull-right" href="{{ route('coatches.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($coatches->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>IMIE</th>
                        <th>NAZWISKO</th>
                        <th>LICENCJA_TRENERA_NAZWA</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($coatches as $coatch)
                            <tr>
                                <td>{{$coatch->ID_TRENER}}</td>
                                <td>{{$coatch->IMIE}}</td>
                    <td>{{$coatch->NAZWISKO}}</td>
                    <td>{{$list[$coatch->LICENCJA_TRENERSKA_ID_LIC_TR]}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('coatches.show', $coatch->ID_TRENER) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('coatches.edit', $coatch->ID_TRENER) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('coatches.destroy', $coatch->ID_TRENER) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $coatches->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection