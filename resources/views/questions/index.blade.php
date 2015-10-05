@extends('app')

@section('content')
    
    <h1>Fragen</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <th class="col-md-3">Frage</th>
            <th class="col-md-3">Antwort</th>
            <th class="col-md-2">Bildlink</th>
            <th class="col-md-1">Bereich</th>                     
            <th class="col-md-3">Aktionen</th>
        </thead>
        @foreach($questions as $question)
            <tr>
                <td>{!! $question->question !!}</td>
                <td>{!! $question->answer !!}</td>
                <td>{!! $question->imagelink !!}</td>
                <td>{!! $question->area->name!!}</td>
                <td>
                    <div class="btn-group">                        
                        {!! Form::open(['class' => 'form-inline', 'method' => 'DELETE', 'route' => ['questions.destroy', $question->id]]) !!}
                        {!! HTML::link('/questions/'.$question->id.'/edit', 'Bearbeiten', array('class'=>'btn btn-default')) !!}
                        {!! Form::submit('Löschen', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    {!! HTML::link('/questions/create', 'Neu', array('class'=>'btn btn-primary')) !!}
@stop
