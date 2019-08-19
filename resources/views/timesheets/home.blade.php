@extends ('layouts.layout_timesheet')
@section('content')
	<div class="row">
		<div class="col-md-2 offset-md-1">
			<h1 class="text-center login-title">List</h1>
			<div class="navbar-collapse">
				<ul class=" navbar-nav">
					<li class="nav-item">
						<a class="nav-link text-primary h5" href="{{route('users.edit.avatar')}}">Update Avatar</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-primary h5" href="{{route('users.edit')}}">Update User</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-primary h5" href="{{route('timesheet.view')}}">View Timesheets</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-primary h5" href="{{route('timesheets.create')}}">Create Timesheets</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-primary h5" href="{{route('users.employees.editpassword')}}">Change Password</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="col-md-3">
			<div>
		   		<img src="{{ $user->avatar }}" alt="Smiley face" class="img-thumbnail">
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="h4">
				<strong>Email:</strong> {{$user->email}}
			</div>
			<div class="h4">
				<strong>Name:</strong> {{$user->name}}
			</div>
			<div class="h4">
				<strong>Role:</strong> {{$user->role}}
			</div>
			<div class="h4">
				<strong>Description:</strong> {{$user->description}}
			</div>
		</div>
	</div>
@stop()