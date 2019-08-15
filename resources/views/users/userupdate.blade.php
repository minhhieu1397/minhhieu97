@extends ('layouts.layout_timesheet')
@section('content')

	<div class="row">
		<div class="col-md-4 offset-md-3">
			<h2 class="h1 text-center">Update</h2>
			


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