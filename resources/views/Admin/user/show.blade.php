@extends ('layouts.admin')

@section('content')
	<div class="col-md-10 content">
		<h2 class="text-center timesheet-content">Show</h2>
		<table class="table table-condensed" >
			<thead>
				<tr class="table__title">
					<th>Name</th>
					<th>Email</th>
					<th>Description</th>
					<th>Role</th>				
					<th>VIEW</th>
				</tr>
			</thead>
			<tbody>
					<tr class="table__content">
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->description}}</td>
						<td>{{$user->role}}</td>
						<td>
							<a href="{{route('admin.users.edit', $user['id'])}}">edit</a>
						</td>
					</tr>
			</tbody>
		</table>
	</div>
@stop()