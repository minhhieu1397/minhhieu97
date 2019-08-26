@extends ('layouts.admin')
@section('content')
	<div class="row content_login">
		<div class="col-md-4 offset-md-4">
			{!! Form::open(['method' => 'POST', 'route' => 'emails.store']) !!}
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
	            	{{ Form::label('email', 'Email', ['class' => 'control-label']) }}
	            	{{ Form::text('email', null, ['class' => 'form-control']) }}
	       		</div>
	       		<div class="form-group">
	       			{!! Form::submit( 'Create', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>

	<div class="row">
		<div class="col-md-10 offset-md-1">
			<table class="table table-condensed" >
				<thead>
					<tr class="table__title">
						<th>Id</th>
						<th>Email</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@php 
						$id = 0;
					@endphp
					@foreach ($emails as $email)
						@php 
							$id ++;
						@endphp
						<tr class="table__content">
							<td>{{$id}}</td>
							<td>{{$email->email}}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['emails.destroy', $email->id]]) !!}
								    <div class="form-group">
						       			{!! Form::submit( 'Delete', ['class' => 'btn btn-danger']) !!}
									</div>
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop()

