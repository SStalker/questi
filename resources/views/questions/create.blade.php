@extends('app')

@section('content')
    <h2>Frage erstellen</h2>
 
    {!! Form::model(new App\Question, ['route' => ['questions.store'], 'files' => true]) !!}
        @include('questions/partials/_form', ['submit_text' => 'Frage erstellen'])
    {!! Form::close() !!}
@stop