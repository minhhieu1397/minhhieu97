@extends ('layouts.admin')

@section('content')
<div class="col-md-11 content">
	<div class="row">
		<div class="col-md-3 offset-md-4">
			<h2 class="text-center timesheet-content">Register</h2>
			{!! Form::open(['method' => 'PUT', 'route' => ['admins.update', $admin->id]]) !!}
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
	            	{{ Form::text('name', $admin->name, ['class' => 'form-control']) }}
	       		</div>
				<div class="form-group">
	            	{{ Form::label('email', 'Email', ['class' => 'control-label']) }}
	            	{{ Form::text('email', $admin->email, ['class' => 'form-control']) }}
	       		</div>
				<div class="form-group">
	       			{!! Form::select('level', ['1' => '1', '2' => '2'], null, ['class' => 'form-control selec-level']) !!}
	       		</div>
	       		<div class="form-group">
	       			{!! Form::submit( 'Update', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@stop()