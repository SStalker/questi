@extends('app')
 
@section('content')
    <h2>Bereich ändern</h2>
 
    {!! Form::model($area, ['method' => 'PATCH', 'route' => ['areas.update', $area->id]]) !!}
        @include('area/partials/_form', ['submit_text' => 'Bereich ändern'])
    {!! Form::close() !!}
@stop