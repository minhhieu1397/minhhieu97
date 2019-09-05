@extends ('layouts.admin')
@section('content')
	<div class="row content_login">
		<div class="col-md-4 offset-md-2">
			<div>
		   		<img src="{{$admin->avatar}}" alt="Smiley face" height="300" width="300" class="img-thumbnail">
			</div>
			<div>
                <a class="nav-link text-success h5" href="{{route('admins.avatar')}}">Upload Avatar</a>
			</div>
		</div>
		<div class="col-md-6">
			<div class="h4">
				<strong>Email:</strong> {{$admin->email}}
			</div>
			<div class="h4">
				<strong>Name:</strong> {{$admin->name}}
			</div>
		</div>
	</div>
@stop()