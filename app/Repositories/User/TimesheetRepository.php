<?php

namespace App\Repositories\User;

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

	public function update($timesheet, $attributes)
	{
		return $this->model->find($timesheet->id)->update($attributes);
	}

	public function delete($timesheet)
	{
        return $this->model->find($timesheet->id)->delete();
	}
}