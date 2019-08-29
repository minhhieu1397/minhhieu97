@extends ('layouts.admin')
@section('content')
	<div class="row content_login">
		<div class="col-md-4 offset-md-2">
			<div>
		   		<img src="" alt="Smiley face" class="img-thumbnail">
			</div>
		</div>
		<div class="col-md-6">
			<div class="h4">
				<strong>Email:</strong> {{$admin->email}}
			</div>
			<div class="h4">
				<strong>Name:</strong> {{$admin->name}}
			</div>
			<div class="h4">
			</div>
		</div>
		</div>
	</div>
@stop()