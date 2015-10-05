@extends('app')
 
@section('content')
    <h2>Frage ändern</h2>
 
    {!! Form::model($question, ['method' => 'PATCH', 'files' => true, 'route' => ['questions.update', $question->id]]) !!}
        @include('questions/partials/_form', ['submit_text' => 'Frage ändern'])
    {!! Form::close() !!}
@stop