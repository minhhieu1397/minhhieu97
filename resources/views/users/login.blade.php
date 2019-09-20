@extends ('layouts.layout_login')

@section('content')
	<div class="row">
		<div class="col-md-2 offset-md-5">
			{!! Form::open(['method' => 'POST', 'route' => 'users.login.post', 'class' => 'form-signin']) !!}
				<h2 class="h1 text-center content-login">Login</h2>
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
        		@if (Session::has( 'success' ))
					 {{ Session::get( 'success' ) }}
				@endif
        		<div class="form-group">
	            	{{ Form::label('email', 'Email:', ['class' => 'sr-only']) }}
	            	{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
	       		</div>
	       		<div class="form-group">
	            	{{ Form::label('password', 'Password:', ['class' => 'sr-only']) }}
	       			{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
	       		</div class="form-group">
				<div class="form-group">
	       			{!! Form::submit( 'Login', ['class' => 'btn btn-lg btn-primary btn-block']) !!}
				</div>
				<p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
			{!! Form::close() !!}
		</div>
	</div>
@stop()


