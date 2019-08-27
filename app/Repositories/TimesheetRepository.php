<?php

namespace App\Repositories;

use App\Models\Timesheets;

class TimesheetRepository
{
	protected $model;

	public function __construct(Timesheets $model)
	{
		$this->model = $model;
	}

	public function all()
	{
    	   return $this->model->all()->where('user_id', \Auth::user()->id);
	}

	public function viewByMonth($month)
	{
		return $this->model->whereMonth('work_date', $month)->Where('user_id', \Auth::user()->id)->get();
	}

	public function viewByDay($date)
	{
		return $this->model->whereDate('work_date', $date )->Where('user_id', \Auth::user()->id)->get();
	}

	public function create($attributes)
	{
		return $this->model->create($attributes);
	}

	public function find($timesheet)
	{
		return $this->model->find($timesheet->id);
	}

	public function update($timesheet, $attributes)
	{
		return $this->model->find($timesheet->id)->update($attributes);
	}

	public function viewApprove()
	{
		return $this->model->where('leader', \Auth::user()->email)->where('approve', 0)->get();
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

	public function delete($timesheet)
	{
        return $this->model->find($timesheet)->delete();
	}
}