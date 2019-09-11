@extends ('layouts.admin')

@section('content')
	<div class="row content_login">
		<div class="col-md-10 offset-md-1">
			<table class="table table-condensed" >
				<thead>
					<tr class="table__title">
						<th>Name</th>
						<th>Email</th>
						<th>level</th>
						<th>VIEW</th>
					</tr>
				</thead>
				<tbody>
					<tr class="table__content">
						<td>{{$admin->name}}</td>
						<td>{{$admin->email}}</td>
						<td>{{$admin->level}}</td>
						<td>
							<a href="{{route('admins.edit', $admin['id'])}}">edit</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@stop()