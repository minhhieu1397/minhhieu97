@extends ('layouts.layout_timesheet')
@section('content')
	<h1 class="h1 text-center text-primary">View</h1>
	<div class="row">
		<div class="col-md-2">
			<h2 class="h5">By date:</h2>
			{!! Form::open(['method' => 'GET', 'route' => 'timesheet.viewDay']) !!}
	            {{Form::date('date', \Carbon\Carbon::now())}}
	       		{!! Form::submit( 'Seach', ['class' => 'btn-primary']) !!}
			{!! Form::close() !!}
		</div>
		<div class="col-md-2">
			<h2 class="h5">By month:</h2>
			{!! Form::open(['method' => 'GET', 'route' => 'timesheet.viewMonth']) !!}
	            {{ Form::text('month', null) }}
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
			<table class="table table-condensed">
				<thead>
					<tr class="table__title">
						<th>Id</th>
						<th>Name</th>
						<th>Work date</th>
						<th>Start time</th>
						<th>End time</th>
						<th>Details</th>
						<th>Issue</th>
						<th>Intention</th>
						<th>Approve</th>
						<th>Late</th>
						<th ></th>
					</tr>
				</thead>
				<tbody>
					@php
						$id = 0;
					@endphp
					@foreach ($timesheets as $timesheet)
						<tr class="table__content">
							@php
								$id ++;
							@endphp
							<td>{{$id}}</td>
							<td>{{$timesheet->name}}</td>
							<td>{{$timesheet->work_date}}</td>
							<td>{{$timesheet->start_time}}</td>
							<td>{{$timesheet->end_time}}</td>
							<td>{{$timesheet->details}}</td>
							<td>{{$timesheet->issue}}</td>
							<td>{{$timesheet->intention}}</td>
							<td>{{$timesheet->approve}}</td>
							<td>{{$timesheet->late_flg}}</td>
							<td> 
								@can('edit-timesheet')<a href="{{route('timesheets.show', $timesheet['id'])}}" title="View TimeSheet!!!" >View</a>@endcan
								{!! Form::open(['method' => 'DELETE', 'route' => ['timesheets.destroy', $timesheet->id]]) !!}
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