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

	public function adminViewTimesheet($user)
	{
		return $this->timesheetRepository->adminViewTimesheet($user);
	}

	public function view_by_month($request, $user)
	{
		$month = $request->input('month');
		$year = \Carbon\Carbon::now()->year;

		return $this->timesheetRepository->view_by_month($user, $month, $year);
	}

	public function showLate($user)
	{
		return $this->timesheetRepository->showLate($user);
	}

	public function numberDateTimesheet($user)
	{
		$month = \Carbon\Carbon::now()->month;
		$year = \Carbon\Carbon::now()->year;

		return $this->timesheetRepository->numberDateTimesheet($user, $month, $year);
	}

	public function showLateFindMonth($request, $user)
	{
		$month = $request->input('month');

		return $this->timesheetRepository->showLateFindMonth($user, $month);
	}

	public function numberDateFindMonth($request, $user)
	{
		$month = $request->input('month');

		return $this->timesheetRepository->numberDateFindMonth($user, $month);
	}
}