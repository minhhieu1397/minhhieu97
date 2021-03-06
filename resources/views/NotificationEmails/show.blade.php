@extends ('layouts.admin')

@section('content')
<div class="content col-md-12">
	<div class="row">
		<div class="col-md-12">
		<h1 class="text-center">Notification</h1>
		</div>
	</div>
	<div class="row content_login">
		<div class="col-md-3">
			{!! Form::open(['method' => 'POST', 'route' => ['notification.store', $user->id]]) !!}
			<div class="form-group">
				{{ Form::label('email', 'Email:', ['class' => 'control-label']) }}
			    {{ Form::text('email', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{!! Form::submit( 'Create', ['class' => 'btn-primary']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
	<div class="row">
		<div class="col-md-10">
			<table class="table table-condensed" >
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
				<thead>
					<tr>
						<th>email</th>
						<th>delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($emails as $email)
						<tr class="table__content">
							<td>{{$email->email}}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['notifications.destroy', $user->id, $email->id]]) !!}
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
</div>
@stop()