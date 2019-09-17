@extends ('layouts.layout_timesheet')
@section('content')
	<div class="row">
		<div class="col-md-3">
			<div>
		   		<img src="{{ $user->avatar }}" alt="Smiley face" height="300" width="300" class="img-thumbnail">
			</div>
		</div>
		<div class="col-md-8 border">
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