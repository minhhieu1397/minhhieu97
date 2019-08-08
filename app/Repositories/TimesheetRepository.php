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
		if (\Auth::user()->role == 'admin') {
            return $this->model->all();
        } else {
    	   return $this->model->all()->where('user_id', \Auth::user()->id);
        }
	}

	public function view_by_month($month)
	{
		return $this->model->whereMonth('work_date', $month)->Where('user_id', \Auth::user()->id)->get();
	}

	public function view_by_week($week)
	{
		return $this->model->where('(work_date)->weekOfYear', $week)->get();
	}

	public function create($attributes)
	{
		return $this->model->create($attributes);
	}

	public function find($timesheet)
	{
		return $this->model->find($timesheet->id);
	}

	public function update($timesheet, array $attributes)
	{
		return $this->model->find($timesheet->id)->update($attributes);
	}
}