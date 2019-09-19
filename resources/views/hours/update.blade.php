@extends ('layouts.admin')

@section('content')
<div class="col-md-11 content">
	<div class="row">
		<div class="col-md-2 offset-md-4">
			<h2 class="h1 text-center timesheet-content">Register</h2>
			{!! Form::open(['method' => 'PUT', 'route' => 'admins.hours.update']) !!}
				@if (Session::has( 'success' ))
					<div class="alert alert-success">
					 	{{ Session::get( 'success' ) }}
					</div>
				@endif
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
	            	{{ Form::time('start_time', $hour->start_time, ['class' => 'form-control']) }}
	       		</div>
	       		<div class="form-group">
	            	{{ Form::label('end_time', 'End Time', ['class' => 'control-label']) }}
	            	{{ Form::time('end_time', $hour->end_time, ['class' => 'form-control']) }}
	       		</div>
	       		<div class="form-group">
	       			{!! Form::submit( 'Update', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@stop()