@extends ('layouts.admin')
@section('content')
<div class="col-md-11 content">
	<h1 class="h1 text-center text-primary">View</h1>
	<div class="row">
		<div class="col-md-4 offset-md-4">
			<div class="text-center text-success">
				Number of days in month
				: {{$numberDate}}
			</div>
			<div class="text-center text-success">
				Late: {{$countLate}}
			</div>
		</div>
	</div>
	<div class="row">

		<div class="col-md-2 form-group">
			<h2 class="h5">By month:</h2>
			{!! Form::open(['method' => 'GET', 'route' => ['admin.timesheet.bymonth', $user->id]]) !!}
	            {{ Form::text('month', null, ['class' => 'form-control classsearch', 'placeholder' => 'Month']) }}
	            {{ Form::text('year', null, ['class' => 'form-control classsearch', 'placeholder' => 'Year']) }}
	       		{!! Form::submit( 'Seach', ['class' => 'btn-primary form-control classsearch']) !!}
			{!! Form::close() !!}
		</div>
	</div>
	<div class="row">
		@php 
			$j = \Carbon\Carbon::parse($month->format('Y-m-d'))->daysInMonth;
		@endphp
		@for ($i = 1 ; $i <= $j ; $i++)
			<div class="col-md-1 day border">
				{{ $i }}<br/>
				{{ data_get(data_get($timesheets, $i), 'work_date') }} <br/>
				{{ data_get(data_get($timesheets, $i), 'details') }}
			</div>
		@endfor
	</div>
@stop()