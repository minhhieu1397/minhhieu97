@extends ('layouts.layout_login')
@section('content')
	<div class="row content_login">
		<div class="col-md-4 offset-md-2">
			<img src="https://sites.google.com/site/hoctaphieuquanhat/_/rsrc/1468757342966/classroom-news/images%20%286%29.jpg" width="300px" height="300px">
		</div>
		<div class="col-md-4">
			<h2 class="h1 text-center">Login</h2>
			
			{!! Form::open(['method' => 'POST', 'route' => 'users.loginpost']) !!}
				
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
	            	{{ Form::label('email', 'Email', ['class' => 'control-label']) }}
	            	{{ Form::text('email', null, ['class' => 'form-control']) }}
	       		</div>

	       		<div class="form-group">
	            	{{ Form::label('password', 'Password', ['class' => 'control-label']) }}

	       			{{ Form::password('password', ['class' => 'form-control']) }}
	       		</div class="form-group">
				<div>
	       			{!! Form::submit( 'Login', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@stop()