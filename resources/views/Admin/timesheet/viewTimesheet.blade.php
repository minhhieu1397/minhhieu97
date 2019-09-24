@extends ('layouts.admin')
@section('content')
<div class="col-md-11 content">
	<h1 class="h1 text-center text-primary">View</h1>
	<div class="row">
		<div class="col-md-2">
			<h2 class="h5">By month:</h2>
				{!! Form::open(['method' => 'GET', 'route' => ['admin.timesheet.bymonth', $user->id]]) !!}
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
				<div class="text-center text-success">
					Number of days in  
					@php
						$month = \Carbon\Carbon::now()->month;
					@endphp
					{{$month}}th
					: {{$numberDate}}
				</div>
				<div class="text-center text-success">
					Late: {{$countLate}}
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
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	
		
		<div class="row">

			<div class="col-md-1 border day">
				1 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==1)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				2 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	2)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				3 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	3)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				4 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	4)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				5 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	5)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				6 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day == 6)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				7 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day == 7)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
		</div>
		<div class="row">

			<div class="col-md-1 border day">
				8 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day == 8)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				9 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	9)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				10 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	10)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				11 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	11)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				12 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	12)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				13 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day == 13)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				14 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day == 14)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
		</div>
		<div class="row">

			<div class="col-md-1 border day">
				15 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day == 15)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				16 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	16)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				17 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	17)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				18 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	18)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				19 <br/>
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	19)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				20 <br/> 
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day == 20)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				21 <br/> 
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day == 21)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
		</div>
		<div class="row">
			<div class="col-md-1 border day">
				22 <br/> 
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day == 22)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				23 <br/> 
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	23)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				24 <br/> 
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	24)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				25 <br/> 
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	25)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				26 <br/> 
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	26)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				27 <br/> 
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day == 27)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				28 <br/> 
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day == 28)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
		</div>
		<div class="row">
			<div class="col-md-1 border day">
				29 <br/> 
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day == 29)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				30 <br/> 
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	30)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
			<div class="col-md-1 border day">
				31 <br/> 
				@foreach ($timesheets as $timesheet)
					@php
						$day = \Carbon\Carbon::createFromDate($timesheet->work_date)->format('d');
					@endphp
					@if($day ==	31)
						{{$timesheet->details}}<br/>
						{{$timesheet->issue}}
					@endif
				@endforeach
			</div>
		</div>
	</div>
@stop()