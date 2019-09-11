<?php
namespace App\Services\Admin;

use Illuminate\Http\Request;
use App\Repositories\Admin\TimesheetRepository;

class TimesheetService
{
	protected $timesheetRepository;

	public function __construct(TimesheetRepository $timesheetRepository)
	{
		$this->timesheetRepository = $timesheetRepository;
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
	public function numberDateTimesheet($user)
	{
		$now = \Carbon\Carbon::now()->month;

		return $this->timesheetRepository->numberDateTimesheet($user, $now);
	}
}