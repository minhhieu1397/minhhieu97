@extends ('layouts.admin')

@section('content')
<div class="col-md-11 content">
	<dir class="row">
		<div class="col-md-3 offset-md-4">
			<h2 class="text-center">Create Admin Accounts</h2>
			{!! Form::open(['method' => 'POST', 'route' => 'admins.store']) !!}
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
	       		<div class="form-group selec-level">
	       			{!! Form::select('level', ['1' => '1', '2' => '2'], null, ['class' => 'form-control']) !!}
	       		</div>
	       		<div class="form-group">
	       			{!! Form::submit( 'Create', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</dir>
</div>
@stop()