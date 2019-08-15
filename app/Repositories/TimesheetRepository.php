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

	public function view_by_month($month)
	{
		return $this->model->whereMonth('work_date', $month)->Where('user_id', \Auth::user()->id)->get();
	}

	public function view_by_week($date)
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

	public function view_approve()
	{
		return $this->model->where('leader', \Auth::user()->email)->where('approve', 0)->get();
	}

	public function update_approve($timesheet, $attributes)
	{
		return $this->model->find($timesheet->id)->update($attributes);
	}

	public function view_timesheet($user)
	{
		return $this->model->orderBy('work_date', 'desc')->where('user_id', $user->id)->get();
	}

	public function delete($timesheet)
	{
        return $this->model->find($timesheet)->delete();
	}
}