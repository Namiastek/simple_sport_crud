@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Licencje sedziów
            <a class="btn btn-success pull-right" href="{{ route('judge_licences.create') }}"><i class="glyphicon glyphicon-plus"></i> Nowa</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($judge_licences->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAZWA</th>
                        <th>WYNAGRODZENIE_ZA_MECZ</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($judge_licences as $judge_licence)
                            <tr>
                                <td>{{$judge_licence->ID_LIC_S}}</td>
                                <td>{{$judge_licence->NAZWA}}</td>
                    <td>{{$judge_licence->WYNAGRODZENIE_ZA_MECZ}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-warning" href="{{ route('judge_licences.edit', $judge_licence->ID_LIC_S) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('judge_licences.destroy', $judge_licence->ID_LIC_S) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $judge_licences->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection