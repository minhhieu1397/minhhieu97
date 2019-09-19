@extends ('layouts.admin')
@section('content')
		<div role="main" class="col-md-11 content">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Admin</h1>
          </div>
          <div class="row">
          	<div class="col-md-4 offset-md-2">
				<div>
			   		<img src="{{$admin->avatar}}" alt="Smiley face" class="img-thumbnail">
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