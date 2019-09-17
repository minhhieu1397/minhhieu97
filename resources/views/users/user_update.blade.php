@extends ('layouts.layout_timesheet')

@section('content')
	<div class="row">
		<div class="col-md-4 offset-md-3 timesheet-content">
			<div>
		   		<img src="{{ $user->avatar }}" alt="Smiley face" height="300" width="300" class="img-thumbnail">
			</div>
			<form action="{{ route('users.update.avatar') }}" enctype='multipart/form-data' method="POST">
		        {{ csrf_field() }}
		        @if ($errors->any())
					<div class="alert alert-danger">
			   			<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
				        </ul>
				    </div>			
				@endif
				@if (Session::has( 'success' ))
					 {{ Session::get( 'success' ) }}
				@endif
		        <input type="file" name="image" required="true">
		        	<br/>
		        <input type="submit" value="upload">
		    </form>
		    @php
				$photo = \Auth::user()->avatar;
		    @endphp
		</div>
	</div>	
@stop()