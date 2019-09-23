@extends ('layouts.admin')

@section('content')
	<div class="col-md-10">
		<h2 class="text-center">Create User Accounts</h2>
		{!! Form::open(['method' => 'POST', 'class'=>'content-create-user', 'route' => 'admins.user.store']) !!}
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
            	{{ Form::label('name', 'Name:', ['class' => 'control-label']) }}
            	{{ Form::text('name', null, ['class' => 'form-control']) }}
       		</div>
       		<div class="form-group">
            	{{ Form::label('email', 'Email:', ['class' => 'control-label']) }}
            	{{ Form::text('email', null, ['class' => 'form-control']) }}
       		</div>
       		<div class="form-group">
            	{{ Form::label('password', 'Password:', ['class' => 'control-label']) }}
       			{{ Form::password('password', ['class' => 'form-control']) }}
       		</div>
       		<div class="form-group">
            	{{ Form::label('password_confirmation', 'Confirm Password:', ['class' => 'control-label']) }}
       			{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
       		</div>
       		<div class="form-group">
            	{{ Form::label('description', 'Description:', ['class' => 'control-label']) }}
            	{{ Form::text('description', null, ['class' => 'form-control']) }}
       		</div>
       		<div class="form-group">
       			{!! Form::select('role', ['Manage' => 'manage', 'Employee' => 'employee'], null, ['class' => 'form-control']) !!}
       		</div>
       		<div class="form-group">
       			{!! Form::submit( 'Create', ['class' => 'btn btn-primary']) !!}
			</div>
		{!! Form::close() !!}
	</div>
@stop()