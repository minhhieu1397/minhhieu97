@extends ('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-md-4 offset-md-3">
			<h2 class="h1 text-center">Register</h2>
			{!! Form::open(['method' => 'PUT', 'route' => 'hours.update']) !!}
				<div class="alert alert-success">
					@if (Session::has( 'success' ))
					 	{{ Session::get( 'success' ) }}
					@endif
				</div>
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
	            	{{ Form::label('start_time', 'Start Time', ['class' => 'control-label']) }}
	            	{{ Form::time('start_time', null, ['class' => 'form-control']) }}
	       		</div>
	       		<div class="form-group">
	            	{{ Form::label('end_time', 'End Time', ['class' => 'control-label']) }}
	            	{{ Form::time('end_time', null, ['class' => 'form-control']) }}
	       		</div>
	       		<div class="form-group">
	       			{!! Form::submit( 'Update', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>	
@stop()