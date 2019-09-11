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
	
	public function viewApprove()
	{
		return $this->model->where('leader', \Auth::guard('admin')->user()->email)->where('approve', 0)->get();
	}

	public function updateApprove($timesheet, $attributes)
	{
		return $this->model->find($timesheet->id)->update($attributes);
	}

	public function adminViewTimesheet($user)
	{
		return $this->model->orderBy('work_date', 'desc')->where('user_id', $user->id)->get();
	}
	
	public function showLate($user)
	{
		return $this->model->orderBy('work_date', 'desc')->where('user_id', $user->id)->where('late_flg', true)->get();
	}
	public function numberDateTimesheet($user, $now)
	{
		return $this->model->whereMonth('work_date', $now)->Where('user_id', $user->id)->get();
	}
}