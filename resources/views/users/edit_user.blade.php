@extends ('layouts.layout_timesheet')

@section('content')
	<div class="row">
		<div class="col-md-3 offset-md-4">
			<h2 class="text-center login-title">Register</h2>
			{!! Form::open(['method' => 'PUT', 'route' => ['users.update', $user->id]]) !!}
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
	       		<div>
	       			{!! Form::submit( 'Update', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>	
@stop()