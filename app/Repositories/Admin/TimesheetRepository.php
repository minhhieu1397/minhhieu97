<?php

namespace App\Repositories\Admin;

use App\Models\Timesheets;

class TimesheetRepository
{
	protected $model;

	public function __construct(Timesheets $model)
	{
		$this->model = $model;
	}
	
	public function adminViewTimesheet($user)
	{
		return $this->model->orderBy('work_date', 'desc')->whereMonth('work_date', \Carbon\Carbon::now()->month)->where('user_id', $user->id)->get();
	}

	public function view_by_month($user, $month)
	{
		return $this->model->orderBy('work_date', 'desc')->whereMonth('work_date', $month)->where('user_id', $user->id)->get();
	}
	
	public function showLate($user)
	{
		return $this->model->orderBy('work_date', 'desc')->whereMonth('work_date', \Carbon\Carbon::now()->month)->where('user_id', $user->id)->where('late_flg', true)->get();
	}

	public function numberDateTimesheet($user, $month, $year)
	{
		return $this->model->whereMonth('work_date', $month)->whereYear('work_date', $year)->Where('user_id', $user->id)->get();
	}

	public function showLateFindMonth($user, $month)
	{
		return $this->model->orderBy('work_date', 'desc')->whereMonth('work_date', $month)->where('user_id', $user->id)->where('late_flg', true)->get();
	}

	public function numberDateFindMonth($user, $month)
	{
		return $this->model->orderBy('work_date', 'desc')->whereMonth('work_date', $month)->where('user_id', $user->id)->get();
	}
}