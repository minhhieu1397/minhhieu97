@extends ('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-md-4 offset-md-3">
			<h2 class="text-center login-title">Register</h2>
			{!! Form::open(['method' => 'PUT', 'route' => ['admin.users.update', $user->id]]) !!}
				<div class="success alert-success">
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
				            	{{ Form::text('leader', $user->leader, ['class' => 'form-control']) }}
				       		</div>
				       		<div class="form-group">
				       			{!! Form::submit( 'Update', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 offset-md-3">
			<h2>Reset Password</h2>
			{!! Form::open(['method' => 'PUT', 'route' => ['users.resetpassword', $user->id]]) !!}
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
	            	{{ Form::label('password', 'Password', ['class' => 'control-label']) }}
	            	{{ Form::password('password', ['class' => 'form-control']) }}
	       	</div>
			<div class="form-group">
	            	{{ Form::label('password_confirmation', 'Confilm Password', ['class' => 'control-label']) }}
	            	{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
	       	</div>
	       	<div class="form-group">
	       		{!! Form::submit( 'Reset Password', ['class' => 'btn btn-primary']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
@stop()