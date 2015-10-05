@extends('app')

@section('content')
    <h2>Bereich erstellen</h2>
 
    {!! Form::model(new App\Area, ['route' => ['areas.store']]) !!}
        @include('area/partials/_form', ['submit_text' => 'Bereich erstellen'])
    {!! Form::close() !!}
@stop