@extends ('layouts.admin')
@section('content')
	<div class="row content_login">
		<div class="col-md-10 offset-md-1">
			<h1 class="text-center login-title">List Users</h1>
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
						<th>level</th>
					</tr>
				</thead>
				<tbody>
					@php 
						$id = 0;
					@endphp
					@foreach ($admins as $admin)
						@php 
							$id ++;
						@endphp
						<tr class="table__content">
							<td>{{$id}}</td>
							<td>{{$admin->name}}</td>
							<td>{{$admin->email}}</td>
							<td>{{$admin->level}}</td>
							<td>
								<a href="{{route('admins.show', $admin['id'])}}">VIEW</a>
								{!! Form::open(['method' => 'DELETE', 'route' => ['admins.destroy', $admin->id]]) !!}
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