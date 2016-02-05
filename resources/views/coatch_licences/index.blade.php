@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Licencje Trenerów
            <a class="btn btn-success pull-right" href="{{ route('coatch_licences.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($coatch_licences->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAZWA</th>
                            <th class="text-right">AKCJE</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($coatch_licences as $coatch_licence)
                            <tr>
                                <td>{{$coatch_licence->ID_LIC_TR}}</td>
                                <td>{{$coatch_licence->NAZWA}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('coatch_licences.show', $coatch_licence->ID_LIC_TR) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('coatch_licences.edit', $coatch_licence->ID_LIC_TR) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('coatch_licences.destroy', $coatch_licence->ID_LIC_TR) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $coatch_licences->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection