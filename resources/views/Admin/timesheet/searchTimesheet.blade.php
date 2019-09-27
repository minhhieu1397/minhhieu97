@extends ('layouts.admin')
@section('content')
<div class="col-md-11 content">
	<h1 class="h1 text-center text-primary">View</h1>

	<div class="row">
		<div class="col-md-2 form-group">
			<h2 class="h5">By month:</h2>
				{!! Form::open(['method' => 'GET', 'route' => ['admin.timesheet.bymonth', $user->id]]) !!}
		            {{ Form::text('month', null, ['class' => 'form-control', 'placeholder' => 'Month']) }}
	            	{{ Form::text('year', null, ['class' => 'form-control', 'placeholder' => 'Year']) }}
		       		{!! Form::submit( 'Seach', ['class' => 'btn-primary']) !!}
				{!! Form::close() !!}
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
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
			</div>
			<div>
				<div class="text-center text-success">
					Number of days in month
					: {{$numberDate}}
				</div>
				<div class="text-center text-success">
					Late: {{$countLate}}
				</div>
			</div>
		</div>
	</div>
		<div class="row">
			@php 
				$j = \Carbon\Carbon::parse($month)->daysInMonth;
			@endphp
			@for ($i = 1 ; $i <= $j ; $i++)
				<div class="col-md-1 day border">
					{{ $i }}<br/>
					@if (count(data_get($timesheets, $i)) == 1)
						  - Time: {{ data_get(data_get($timesheets, $i), 'start_time') }} => {{ data_get(data_get($timesheets, $i), 'end_time') }} <br/>
						  - Details: {{ data_get(data_get($timesheets, $i), 'details') }}<br/>
						  - Issue: {{ data_get(data_get($timesheets, $i), 'issue') }}<br/> 
						  - Intention: {{ data_get(data_get($timesheets, $i), 'intention') }}<br/>
					@endif
				</div>
			@endfor
		</div>
	
		<div class="modal" id="myModal">
		    <div class="modal-dialog">
			    <div class="modal-content">
			        <!-- Modal Header -->
			        <div class="modal-header">
				        <h4 class="modal-title">Modal Heading</h4>
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        
			        <!-- Modal body -->
			        <div class="modal-body">
			        	
			        </div>
			        
			        <!-- Modal footer -->
			        <div class="modal-footer">
			            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			        </div>
			        
			    </div>
		    </div>
	    </div>
	</div>
	<script type="text/javascript">
		
		$('.clickMe').on('click', function() {
			let contentAlert = $(this).closest('.day').find('.timesheet-detail').text();
			alert(contentAlert);
		})
	</script>
@stop()