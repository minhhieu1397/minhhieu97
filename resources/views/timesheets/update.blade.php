@extends ('layouts.layout_timesheet')
@section('content')
	
	<div class="row">
		<div class="col-md-3 offset-md-4">
			<h1 class="h1 text-center text-primary"> Edit Timesheet</h1>

			{!! Form::open(['method' => 'PUT', 'route' => ['timesheets.update', $timesheet->id]]) !!}

					@if ($errors->any())
						<div class="alert alert-danger">
				   			<ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
						</div>
					@endif
        
	       		<div class="form-group">
	            	{{ Form::label('details', 'Details:', ['class' => 'control-label']) }}
	            	{{ Form::textarea('details', $timesheet->details, ['class' => 'form-control', 'rows' => 3]) }}
	       		</div>

				<div>
	       			{!! Form::submit( 'Update', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
			
		</div>
	</div>		

@stop()