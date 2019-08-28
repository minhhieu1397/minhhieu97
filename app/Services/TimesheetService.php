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

	public function getAll()
	{
		return $this->timesheetRepository->all();
	}

	public function viewByMonth($request)
	{
		$month = $request->input('month');

		return $this->timesheetRepository->viewByMonth($month);
	}

	public function viewByDay($request)
	{
		$date = $request->input('date');

		return $this->timesheetRepository->viewByDay($date);
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
            'issue' => $request->input('issue'),
            'intention' => $request->input('intention'),
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
        	'details' => $request->input('details'),
        	'issue' => $request->input('issue'),
        	'intention' => $request->input('intention'),
        ]);
	}

	public function viewApprove()
	{
		return $this->timesheetRepository->viewApprove();
	}

	public function updateApprove($timesheet)
	{
		return $this->timesheetRepository->updateApprove($timesheet, [
			'approve' => true,
		]);
	}

	public function adminViewTimesheet($user)
	{
		return $this->timesheetRepository->adminViewTimesheet($user);
	}

	public function showLate($user)
	{
		return $this->timesheetRepository->showLate($user);
	}

	public function delete($timesheet)
	{
		return $this->timesheetRepository->delete($timesheet);
	}
}