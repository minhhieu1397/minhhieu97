<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\TimesheetRepository;



class TimesheetService
{
	protected $timesheetRepository;

	public function __construct(TimesheetRepository $timesheetRepository)
	{
		$this->timesheetRepository = $timesheetRepository;
	}

	public function index()
	{
		return $this->timesheetRepository->all();
	}

	public function view_by_month($request)
	{
		$month = $request->input('month');

		return $this->timesheetRepository->view_by_month($month);
	}

	public function view_by_week($request)
	{
		$date = $request->input('date');

		return $this->timesheetRepository->view_by_week($date);
	}

	public function create($request)
	{
		$now = \Carbon\Carbon::now();
        $workDate = \Carbon\Carbon::parse($request->input('work_date'))->hour(17);
        $lateFlg = $now->diffInSeconds($workDate, false) < 0;

        $timesheet = $this->timesheetRepository->create([
        	'name' => \Auth::user()->name,
            'work_date' => $request->input('work_date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'details' => $request->input('details'),
            'approve' => false,
            'late_flg' => $lateFlg,
            'leader' => \Auth::user()->leader,
            'user_id' => \Auth::user()->id
        ]);

		return $timesheet;
	}

	public function show($timesheet)
	{
		return $this->timesheetRepository->find($timesheet);
	}

	public function update($request, $timesheet)
	{
		$attributes = $request->all();
      
        return $this->timesheetRepository->update($timesheet, [
        	'approve' => false,
        	'details' => $request->input('details')
        ]);
	}

	public function view_approve()
	{
		return $this->timesheetRepository->view_approve();
	}

	public function update_approve($timesheet)
	{
		return $this->timesheetRepository->update_approve($timesheet, [
			'approve' => true,
		]);
	}
}