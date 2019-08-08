@extends ('layouts.layout_timesheet')
@section('content')
	<h1 class="h1 text-center text-primary">View</h1>

	<div class="row">
		<div class="col-md-2">
			<h2 class="h5">By week:</h2>
				{!! Form::open(['method' => 'GET', 'route' => 'timesheet.viewweek']) !!}
		            {{ Form::text('week', null) }}
		       		{!! Form::submit( 'Seach', ['class' => 'btn-primary']) !!}
				{!! Form::close() !!}
		</div>
		<div class="col-md-2">
			<h2 class="h5">By month:</h2>
				{!! Form::open(['method' => 'GET', 'route' => 'timesheet.viewmonth']) !!}
		            {{ Form::text('month', null) }}
		       		{!! Form::submit( 'Seach', ['class' => 'btn-primary']) !!}
				{!! Form::close() !!}
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 ">
			<div class="text-center">
				@if (Session::has( 'success' ))
					{{ Session::get( 'success' ) }}
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
			
			<table class="table table-condensed">
				<thead>
					<tr class="table__title">
						<th>ID</th>
						<th>NAME</th>
						<th>WORD DATE</th>
						<th>START TIME</th>
						<th>END TIME</th>
						<th>DETAILS</th>
						<th>APPROVE</th>
						<th>LATE</th>
						<th ></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($timesheets as $timesheet)
						<tr class="table__content">
							<td>{{$timesheet->id}}</td>
							<td>{{$timesheet->name}}</td>
							<td>{{$timesheet->work_date}}</td>
							<td>{{$timesheet->start_time}}</td>
							<td>{{$timesheet->end_time}}</td>
							<td>{{$timesheet->details}}</td>
							<td>{{$timesheet->approve}}</td>
							<td>{{$timesheet->late_flg}}</td>
							<td> 
								<a href="{{route('timesheets.show', $timesheet['id'])}}" title="View TimeSheet!!!" >View</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop()