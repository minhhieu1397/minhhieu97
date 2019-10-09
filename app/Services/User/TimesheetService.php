<?php
namespace App\Services\User;

use Illuminate\Http\Request;
use App\Repositories\User\TimesheetRepository;
use App\Services\Interfaces\User\TimesheetInterface;


class TimesheetService implements TimesheetInterface
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

	public function delete($timesheet)
	{
		return $this->timesheetRepository->delete($timesheet);
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
}