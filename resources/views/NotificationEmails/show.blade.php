@extends ('layouts.admin')

@section('content')
	<div class="row content_login">
		<div class="col-md-10 offset-md-1">
			<h1>Notification</h1>
			{{$user->id}}
			{!! Form::open(['method' => 'POST', 'route' => ['notification.store', $user->id]]) !!}
				{{ Form::label('email', 'Email:', ['class' => 'control-label']) }}
			    {{ Form::text('email', null, ['class' => 'form-control']) }}
				{!! Form::submit( 'Create', ['class' => 'btn-primary']) !!}
			{!! Form::close() !!}
		</div>
	</div>
	<div class="row content_login">
		<div class="col-md-10 offset-md-1">
			<table class="table table-condensed" >
				<thead>
					<tr class="table__title">
						<th>email</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($emails as $email)
						<tr class="table__content">
							<td>{{$email->email}}</td>
							<td>
								<a>edit</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop()