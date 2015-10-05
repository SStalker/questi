@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			Bereich ändern:
			{!! Form::open(['method' => 'GET', 'action' => 'HomeController@index']) !!}
			    {!! Form::select('area_id', $areas, $currentArea, ['onchange' => 'this.form.submit()']) !!}
			{!! Form::close() !!}

			@foreach($questions as $question)
				<div class="panel panel-default">
					<div class="panel-heading"><h2>{{ $question->question }}</h2></div>

					<div class="panel-body">
						<div>
							{!! HTML::link('#', 'Lösung anzeigen', array('class'=>'btn btn-primary answer', 'data' => 'a1')) !!}
						</div>
						<div class="hidden-answer">
							<p style="font-size: 20px;">
								<img class="img-responsive pull-right" alt="image" src="{{ $question->imagelink }}" />
								{{ $question->answer }}							
							</p>
						</div>
					</div>
				</div>				
			@endforeach
			
		</div>
	</div>
@endsection
