@extends ('layouts.admin')
@section('content')
  <h1 class="h1 text-center text-primary">View</h1>

 
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
          @foreach ($timesheets as $timesheet)
            <tr class="table__content">
              <td>{{$timesheet->id}}</td>
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
                {!! Form::open(['method' => 'PUT', 'route' => ['timesheet.approve_edit', $timesheet->id]]) !!}
                  <div class="form-group">
                    {!! Form::submit( 'Approve', ['class' => 'btn btn-success']) !!}
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