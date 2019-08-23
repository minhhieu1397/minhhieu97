@extends ('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-md-4 offset-md-4">
			<h2 class="text-center login-title">Register</h2>
			{!! Form::open(['method' => 'POST', 'route' => 'admins.store']) !!}
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
	            	{{ Form::label('name', 'Name', ['class' => 'control-label']) }}
	            	{{ Form::text('name', null, ['class' => 'form-control']) }}
	       		</div>
				
	       		<div class="form-group">
	       			{!! Form::submit( 'Create', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>	
@stop()