@extends('app')

@section('content')
    
    <h1>Bereiche</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <th class="col-md-9">Name</th>            
            <th class="col-md-3">Aktionen</th>
        </thead>
        @foreach($areas as $area)
            <tr>
                <td>{!! $area->name !!}</td>
                <td>
                    <div class="btn-group">                        
                        {!! Form::open(['class' => 'form-inline', 'method' => 'DELETE', 'route' => ['areas.destroy', $area->id]]) !!}
                        {!! HTML::link('/areas/'.$area->id.'/edit', 'Bearbeiten', array('class'=>'btn btn-default')) !!}
                        {!! Form::submit('Löschen', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    {!! HTML::link('/areas/create', 'Neu', array('class'=>'btn btn-primary')) !!}
@stop
