@extends ('layouts.layout_timesheet')
@section('content')
	<div class="row">
		<div class="col-md-4 offset-md-3">
			<h2 class="h1 text-center">Register</h2>

			{!! Form::open(['method' => 'PUT', 'route' => ['users.update']]) !!}

				
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
	            	{{ Form::label('description', 'Description', ['class' => 'control-label']) }}
	            	{{ Form::text('description', $user->description, ['class' => 'form-control']) }}
	       		</div>

	       		<div class="form-group">
	       			{!! Form::submit( 'Update', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>	
@stop()