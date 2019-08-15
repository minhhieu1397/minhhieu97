@extends ('layouts.admin')
@section('content')
	<div class="row content_login">
		<div class="col-md-10 offset-md-1">
			<table class="table table-condensed" >
				<thead>
					<tr class="table__title">
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Description</th>
						<th>Role</th>
						<th>leader</th>
						<th>View Timesheet</th>			
						<th>View</th>
					</tr>
				</thead>
				<tbody>
					@php 
						$id = 0;
					@endphp

					@foreach ($users as $user)
						@php 
							$id ++;
						@endphp
						<tr class="table__content">
							<td>{{$id}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->description}}</td>
							<td>{{$user->role}}</td>
							<td>{{$user->leader}}</td>
							<td><a href="{{ route('admin.timesheet.user', $user['id']) }}">Timesheet</a></td>
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