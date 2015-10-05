<div class="form-group">
    {!! Form::label('question', 'Frage:') !!}
    {!! Form::textarea('question') !!}
</div>
<div class="form-group">
    {!! Form::label('answer', 'Antwort:') !!}
    {!! Form::textarea('answer') !!}
</div>
<div class="form-group">
    {!! Form::label('imagelink', 'Bildlink:') !!}
    {!! Form::file('imagelink'); !!}
</div>
<div class="form-group">
    {!! Form::label('area_id', 'Bereich:') !!}
    @if(isset($question))
    	{!! Form::select('area_id', $areas, $question->area_id) !!}
    @else
    	{!! Form::select('area_id', $areas) !!}
    @endif
    
</div>
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
</div>