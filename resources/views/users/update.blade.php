@extends ('layouts.admin')
@section('content')

	<div class="row">
		<div class="col-md-4 offset-md-3">
			<h2 class="h1 text-center">Register</h2>

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
	            	{{ Form::label('name', 'Name', ['class' => 'control-label']) }}
	            	{{ Form::text('name', $user->name, ['class' => 'form-control']) }}
	       		</div>

				<div class="form-group">
	            	{{ Form::label('email', 'Email', ['class' => 'control-label']) }}
	            	{{ Form::text('email', $user->email, ['class' => 'form-control']) }}
	       		</div>

				<div class="form-group">
	       			{!! Form::select('role',['admin' => 'admin', 'user' => 'user']) !!}
	       		</div>

	       		<div class="form-group">
	            	{{ Form::label('leader', 'Leader', ['class' => 'control-label']) }}
	            	{{ Form::text('leader', null, ['class' => 'form-control']) }}
	       		</div>
    			
	       		<div class="form-group">
	       			{!! Form::submit( 'Update', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>	


@stop()