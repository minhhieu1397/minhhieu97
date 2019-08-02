@extends ('layouts.admin')
@section('content')
	<div class="row content_login">
		<div class="col-md-10 offset-md-1">
			<table class="table table-condensed" >
				<thead>
					<tr class="table__title">
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Description</th>
						<th>Role</th>					
						<th>VIEW</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
						<tr class="table__content">
							<td>{{$user->id}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->description}}</td>
							<td>{{$user->role}}</td>

							<td>
								<a href="{{route('users.show', $user['id'])}}">VIEW</a>
								{!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id]]) !!}
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