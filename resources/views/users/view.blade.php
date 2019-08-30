@extends ('layouts.admin')
@section('content')
	<div class="row content_login">
		<div class="col-md-10 offset-md-1">
			<h1 class="text-center login-title">List Users</h1>
			<div>
				{!! Form::open(['method' => 'GET', 'route' => 'users.search']) !!}
					{{ Form::label('search', 'Seach by name:', ['class' => 'control-label']) }}
					{{ Form::text('search', null) }}
						       		{!! Form::submit( 'Search', ['class' => 'btn-primary']) !!}
				{!! Form::close() !!}
 			</div>
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
					<tr class="table__title">
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Description</th>
						<th>Role</th>
						<th>leader</th>
						<th>View Timesheet</th>			
						<th>View</th>
						<th>Notification</th>
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
							<td><a href="{{ route('users.timesheet', $user['id']) }}">Timesheet</a></td>
							<td>
								<a href="{{route('users.show', $user['id'])}}">VIEW</a>
								{!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id]]) !!}
									<div class="form-group">
										{!! Form::submit( 'Delete', ['class' => 'btn btn-danger']) !!}
									</div>
								{!! Form::close() !!}
							</td>
							<td><a href="{{ route('emails.show', $user['id'])}}">View Notification</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop()